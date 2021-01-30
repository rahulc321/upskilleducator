<?php

namespace App\Http\Controllers\Website\Auth;

use App\Models\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/my-account', $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
        $this->middleware('guest')->except('logout');
        $this->user = $users;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginView()
    {
        return view('website.login.index');
    }

    public function registerView()
    {
        return view('website.register.index');
    }
}
