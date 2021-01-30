<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\RegistrationJob;
use App\Models\Users;
use App\Models\Cartnew;

use App\Http\Controllers\Controller;
use App\Utils\AppConstant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a Trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/my-account';

    public function redirectPath()
    {
        if (Session::has('redirect')) {
            $redirect = Session::get('redirect');
            Session::forget('redirect');
            return $this->redirectTo = $redirect;
        } else {
            if (method_exists($this, 'redirectTo')) {
                return $this->redirectTo();
            }
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'same:password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=  Users::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'plain_pass' =>   $data['password'],
            'mobile_no' => $data['phone_no'],
        ]);
        
        
           if(Session::get('uId')){
            $cart1= Cartnew::where('user_id',Session::get('uId'))->get();
            foreach ($cart1 as $key => $value) {
                $cart2= Cartnew::where('id',$value->id)->first();
                $cart2->user_id= $user->id;
                $cart2->save();
                 DB::commit();
            }
            
            }
            Session::forget('uId');
            return $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

             
            



            $this->guard()->login($user);

            $data['user'] = $user;

            RegistrationJob::dispatch($data)->onQueue(AppConstant::REGISTRATION);


           \Auth::login($user);

            DB::commit();
            Session::flash('success', __('auth.register'));

            if(Session::get('redirect')){
                return redirect(Session::get('redirect'));
            }else{
                return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }
}
