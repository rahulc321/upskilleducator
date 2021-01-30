<?php

namespace App\Http\Controllers\Website\Auth;

use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    protected $users, $orders, $data;

    /**
     * AccountController constructor.
     * @param Users $users
     * @param Orders $orders
     */
    public function __construct(
        Users $users,
        Orders $orders
    )
    {
        $this->users = $users;
        $this->orders = $orders;
        $this->data = [];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myAccount()
    {
        $user = Auth::user();
        $this->data['orders'] = $this->orders
            ->with(['order_items', 'payment_details'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('website.my-account.index', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->users->where('id', $request->user()->id)->update([
                'fullname' => $request->fullname,
                'mobile_no' => $request->phone_no,
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
            ]);

            DB::commit();
            Session::flash('success', __('auth.profile_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->users->where('id', $request->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::commit();
            Session::flash('success', __('auth.password_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }
}
