<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\OrderPaymentDetails;
use App\Models\Orders;
use App\Models\OurSpeaker;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    protected $payments, $data, $orders, $speakers, $users;

    /**
     * DashboardController constructor.
     * @param OrderPaymentDetails $payments
     */
    public function __construct(
        OrderPaymentDetails $payments,
        Orders $orders,
        Users $users,
        OurSpeaker $ourSpeaker
    )
    {
        $this->payments = $payments;
        $this->orders = $orders;
        $this->users = $users;
        $this->speakers = $ourSpeaker;
        $this->data = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['revenue'] = $this->payments->sum('card_amount');
        $this->data['orders'] = $this->orders->all();
        $this->data['users'] = $this->users->all();
        $this->data['speakers'] = $this->speakers->all();
        return view('admin.dashboard.index', $this->data);
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
