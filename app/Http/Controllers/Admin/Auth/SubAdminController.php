<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Jobs\RegistrationJob;
use App\Mail\RegistrationMail;
use App\Entities\Models\User;
use App\Entities\Repositories\BaseRepository;
use App\Models\Users;
use App\Models\Admin;
use App\Models\Permision;
use App\Models\PermisionPage;
use App\Utils\AppConstant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class SubAdminController extends Controller
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
        $this->data['users'] = Admin::where('admin_type',2)->orderBy('created_at','DESC')->get();
        return view('admin.sub-admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub-admin.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();    
         
        $checkEmail= admin::where('email',$data['email'])->first();
        if($checkEmail){
            Session::flash('error', __('Email Already Exist!!'));
            return redirect()->back()->withInput();
        }

        $admin= new admin();
        $admin->name= $data['fullname'];
        $admin->username= $data['fullname'];
        $admin->email= $data['email'];
        $admin->password= Hash::make($data['password']);
        $admin->plain_pass= $data['password'];
        $admin->status= 1;
        $admin->save();
        // dd($data);
        foreach ($data['pageId'] as $key => $value) {
            $getPage= Permision::where('id',$value)->first();
            

            $insertData= new PermisionPage();
            $insertData->user_id=$admin->id;
            $insertData->page_id=$getPage->id;
            $insertData->page_name=$getPage->page_name;
            $insertData->permision=$data['permision'][$key];
            $insertData->save();

        }
        
        $getData= Admin::where('id',$admin->id)->first();
        $data['user']=  $getData;
        
        \Mail::to($data['email'])->send(new RegistrationMail($data));
        Session::flash('success', __('You have Successfully Registered!!'));

        return redirect('/admin/sub-admin');
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
        $this->data['admin']= Admin::where('id',$id)->first();
        $this->data['pagepPermision']= PermisionPage::where('user_id',$id)->get();
        return view('admin.sub-admin.update',$this->data);
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
        $data= $request->all();    
        
        if($data['cpass']!=$data['confirmpass']){
             \Session::flash('error', __('Password don`t Match!!'));
            return redirect()->back()->withInput();
        }
       
        $admin= admin::where('id',$id)->first();
        $admin->name= $data['fullname'];

        if($data['cpass'] != "" && $data['confirmpass'] !="" ){
            $admin->password= \Hash::make($data['confirmpass']);

            $admin->plain_pass=  $data['confirmpass'];


        }

        $admin->save();
         
        foreach ($data['pageId'] as $key => $value) {
             
            $insertData= PermisionPage::where('id',$value)->first();
            
            $insertData->permision=$data['permision'][$key];
             
            $insertData->update();

        }

        if($data['cpass'] != "" && $data['confirmpass'] !="" ){
             
            $data1=  array('fullname'=>$data['fullname'],'password'=>$data['confirmpass'],'email'=>$data['email']);;
            
            \Mail::to($data['email'])->send(new RegistrationMail($data1));
        }


        Session::flash('success', __('You have Successfully Updated!!'));
        return redirect('/admin/sub-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $admin= admin::where('id',$id)->first();
        $admin->status=0;
        $admin->update();
        Session::flash('success', __('You have Successfully Updated!!'));
        return redirect('/admin/sub-admin');
    }
    
    
    public function updateUser(Request $request, $id)
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
             
            //$getData= Users::where('id',$id)->first();
            $data2=  array('fullname'=>$input['fullname'],'password'=>$input['confirmpass'],'email'=>$input['email']);
            
           
            \Mail::to($input['email'])->send(new RegistrationMail($data2));
        }
        $updateUser->update();
        \Session::flash('success', __('You have Successfully Updated!!'));

        return redirect('/admin/users');

    }

}
