<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Entities\Models\User;
use App\Entities\Repositories\BaseRepository;
use App\Models\Users;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;

class UserController extends Controller
{
    protected $users, $data;

    public function __construct(
        Users $users
    )
    {
        $this->users = $users;
        $this->data = [];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = $this->users->orderBy('created_at','DESC')->get();
        return view('admin.users.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $type
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $userType = ($type === AppConstant::JOBSEEKER) ? 1 : 2;
        $this->data['users'] = $this->users->where([
            'user_type' => $userType
        ])->get();
        return view('admin.users.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $this->data['user']= Users::where('id',$id)->first();
        return view('admin.users.update', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $input= $request->all();

        if($input['cpass']!=$input['confirmpass']){
             \Session::flash('error', __('Password don`t Match!!'));
            return redirect()->back()->withInput();
        }
        
        $updateUser= Users::where('id',$id)->first();
        $updateUser->fullname= $input['fullname'];
        $updateUser->job_title= $input['job_title'];
        $updateUser->company_address= $input['company_address'];
        $updateUser->company_name= $input['company_name'];
        $updateUser->email= $input['email'];
        $updateUser->mobile_no= $input['phone'];
        $updateUser->status= $input['status'];

        if($input['cpass'] != "" && $input['confirmpass'] !="" ){
            $updateUser->password= \Hash::make($input['confirmpass']);

            $updateUser->plain_pass=  $input['confirmpass'];


        }
        

        if($input['cpass'] != "" && $input['confirmpass'] !="" ){
             
            $getData= Users::where('id',$id)->first();
            $data1['user']=  $getData;
            
            \Mail::to($input['email'])->send(new RegistrationMail($data1));
        }
        $updateUser->update();
        \Session::flash('success', __('You have Successfully Updated!!'));

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
