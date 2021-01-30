<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $admin;

    public function __construct(
        Admin $admim
    )
    {
        $this->admin = $admim;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileView()
    {
        return view('admin.profile.index');
    }

    public function profile(Request $request)
    {
        try {
            DB::beginTransaction();

            $admin = Auth::guard(AppConstant::ADMIN_GUARD)->user();

            $administrator = $this->admin->find($admin->id);
            if ($request->hasFile('profile_pic')) {
                if ($admin->profile_picture != "" || $admin->profile_picture != null) {
                    $oldImage = $admin->profile_picture;
                    $path_parts = pathinfo($oldImage);
                    Storage::delete('/public' . '/admin/' . $path_parts['basename']);
                }
                $filename = md5(microtime());
                $file = $request->file('profile_pic');
                $path = $file->storeAs('admin', $filename . '.' . $file->getClientOriginalExtension(), 'public');
                $administrator->name = $request->username;
                $administrator->profile_picture = $path;
            } else {
                $administrator->name = $request->username;
            }
            $administrator->save();

            DB::commit();
            Session::flash('success', __('message.profile_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePasswordView()
    {
        return view('admin.change-password.index');
    }

    public function changePassword(Request $request)
    {
        
        try {
            DB::beginTransaction();

            $admin = Auth::guard(AppConstant::ADMIN_GUARD)->user();

            $password = $request->old_password;

            if (!Hash::check($password, $admin->password)) {
                Session::flash('error', __('message.password_match'));
                return redirect()->back();
            }

            $administrator = $this->admin->find($admin->id);
            $administrator->password = Hash::make($request->re_password);
            $administrator->save();

            DB::commit();
            Session::flash('success', __('message.change_password'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }
}
