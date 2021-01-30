<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Entities\Models\User;
use App\Entities\Repositories\BaseRepository;
use App\Models\Users;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
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
        //
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
