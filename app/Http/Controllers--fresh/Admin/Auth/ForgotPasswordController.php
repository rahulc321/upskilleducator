<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Jobs\ForgotPasswordJob;
use App\Models\Admin;
use App\Models\Users;
use App\Utils\AppConstant;
use App\Utils\GetTokens;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    private $admin, $user, $data;

    /**
     * ForgotPasswordController constructor.
     * @param Users $users
     * @param Admin $admin
     */
    public function __construct(
        Users $users,
        Admin $admin
    )
    {
        $this->user = $users;
        $this->admin = $admin;
        $this->data = [];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(Request $request)
    {
        try {
            DB::beginTransaction();

            switch ($request->type) {
                case 'user':
                    $user = $this->user->where([
                        'email' => strtolower($request->email)
                    ])->first();
                    break;
                case 'admin':
                    $user = $this->admin->where([
                        'email' => strtolower($request->email)
                    ])->first();
                    break;
            }

            if (!$user) {
                Session::flash('error', __('auth.forgot_password_email_error'));
                return redirect()->back();
            }

            $getToken = new GetTokens();
            $token = $getToken->limit(10);
            $token = $token->token;
            $user->forgot_password_code = $token;
            $user->save();

            $this->data['user'] = $user;
            $this->data['type'] = $request->type;

            ForgotPasswordJob::dispatch($this->data)->onQueue(AppConstant::FORGOT_PASSWORD);

            DB::commit();
            Session::flash('success', __('auth.forgot_password_success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function resetPasswordView(Request $request)
    {
        if (!$request->hasValidSignature()) {
            Session::flash('error', __('auth.invalid_url'));
            return redirect('/');
        }

        switch ($request->type) {
            case 'user':
                $user = $this->user->where([
                    'uuid' => $request->user
                ])->first();
                $redirect = '/login';
                break;
            case 'admin':
                $user = $this->admin->where([
                    'uuid' => $request->user
                ])->first();
                $redirect = '/admin';
                break;
        }

        if (!$user || $user->forgot_password_code === null) {
            Session::flash('error', __('auth.invalid_url'));
            return redirect($redirect);
        }

        $this->data['url'] = $request->fullUrl();
        return view('forgot-password.index', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function resetPassword(Request $request)
    {
        try {
            DB::beginTransaction();

            if (!$request->hasValidSignature()) {
                Session::flash('error', __('auth.invalid_url'));
                return redirect('/');
            }

            $validator = Validator::make($request->all(), [
                'password' => ['required'],
                'password_confirmation' => ['required_with:password', 'same:password'],
            ], [
                'password_confirmation.same' => __('auth.password_mistmatch')
            ]);

            if ($validator->fails()) {
                Session::flash('error', $validator->messages()->first());
                return redirect()->back()->withInput();
            }

            switch ($request->type) {
                case 'user':
                    $this->user->where([
                        'uuid' => $request->user
                    ])->update([
                        'password' => Hash::make($request->password),
                        'forgot_password_code' => null
                    ]);
                    $redirect = '/login';
                    break;
                case 'admin':
                    $this->admin->where([
                        'uuid' => $request->user
                    ])->update([
                        'password' => Hash::make($request->password),
                        'forgot_password_code' => null
                    ]);
                    $redirect = '/admin';
                    break;
            }

            DB::commit();
            Session::flash('success', __('auth.password_changed'));
            return redirect($redirect);
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }
}
