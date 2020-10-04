<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Utils\AppConstant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public $redirectTo = AppConstant::ADMIN_GUARD . '/dashboard';

    public function __construct()
    {
        $this->middleware('admin.redirect')->except('logout');
    }

    public function index()
    {
        return view('admin.login.index');
    }

    public function username()
    {
        return 'email';
    }

    public function guard()
    {
        return Auth::guard(AppConstant::ADMIN_GUARD);
    }

    public function credentials(Request $request)
    {
        return array(
            'email' => $request->email,
            'password' => $request->password,
            'status' => AppConstant::STATUS_ACTIVE
        );
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, array(
            $this->username() => ['required', 'email'],
            'password' => ['required'],
        ));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget(AppConstant::ADMIN_GUARD);
        $request->session()->regenerate();
        return redirect(AppConstant::ADMIN_URL);
    }
}
