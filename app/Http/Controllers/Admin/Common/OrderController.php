<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;
use App\Models\OurSpeaker;
use App\Models\Product;
use App\Models\OrderItems;

class OrderController extends Controller
{
    protected $order, $data;

    public function __construct(Orders $order)
    {
        $this->order = $order;
        $this->data = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $admin = \Auth::guard(\App\Utils\AppConstant::ADMIN_GUARD)->user();
            if($admin->admin_type==2){
            $speaker= OurSpeaker::where('email',$admin->email)->first();
            $productId= Product::where('speaker_name',$speaker['title'])->pluck('id');
            $orderItems= OrderItems::whereIn('product_id',$productId)->pluck('order_id');
            // dd($orderItems);
            $this->data['orders'] = $this->order->whereIn('id',$orderItems)->orderBy('created_at','DESC')->get();

            }else{
                $this->data['orders'] = $this->order->orderBy('created_at','DESC')->get();
            }



            return view('admin.order.index', $this->data);
        
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
        try {
            DB::beginTransaction();

            $this->order->where('uuid', $request->order_id)->update([
                'webinar_link' => $request->link
            ]);

            DB::commit();
            Session::flash('success', __('message.upload_success'));
            return redirect()->back()->withInput();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
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
