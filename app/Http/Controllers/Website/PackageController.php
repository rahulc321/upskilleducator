<?php

namespace App\Http\Controllers\Website;

use App\Jobs\OrderConfirmationJob;
use App\Models\CartProduct;
use App\Models\CityStateCountry;
use App\Models\OrderItems;
use App\Models\Cartnew;
use App\Models\OrderPaymentDetails;
use App\Models\Orders;
use App\User;
use App\Models\Product;
use App\Models\Program;
use App\Models\Coupon;
use App\Models\CouponDetail;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PackageController extends Controller
{
    protected $cart, $product, $order, $paymentDetails, $orderItems, $cityStateCountry, $data;

    /**
     * CartController constructor.
     * @param CartProduct $cartProduct
     * @param Product $product
     * @param Orders $orders
     * @param OrderPaymentDetails $paymentDetails
     * @param OrderItems $orderItems
     */
    public function __construct(
        CartProduct $cartProduct,
        Product $product,
        Orders $orders,
        OrderPaymentDetails $paymentDetails,
        OrderItems $orderItems,
        CityStateCountry $cityStateCountry
    )
    {
        $this->cart = $cartProduct;
        $this->product = $product;
        $this->order = $orders;
        $this->paymentDetails = $paymentDetails;
        $this->orderItems = $orderItems;
        $this->cityStateCountry = $cityStateCountry;
        $this->data = [];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

     public function packageCheckout(Request $request){
        $user = Auth::user();
        $carts = \Cart::getContent();
        if ($user) {
            foreach ($carts as $cart) {
                $detail = $this->cart->where([
                    'product_id' => $cart->id,
                    'user_id' => $user->id
                ])->first();

                if ($detail) {
                    $cartAdd = $this->cart->find($detail->id);
                } else {
                    $cartAdd = $this->cart;
                }
                $cartAdd->user_id = $user->id;
                $cartAdd->product_id = $cart->id;
                $cartAdd->quantity = $cart->quantity;
                $cartAdd->save();
            }
        }
        //$this->data['country'] = $this->cityStateCountry->where('state', 'Quebec')->get()->toArray();
        //dd($this->data['country']);
        $this->data['carts'] = $this->cart->where('user_id', $user->id)->get();
        return view('website.package.checkout.package', $this->data);
    }


     public function paymentCardView(Request $request)
    {
        $this->data['checkout_data'] = $request->all();
        return view('website.package.payment.stripe', $this->data);
    }


     public function cardPayment(Request $request)
    {
        try {
            DB::beginTransaction();
            $requestData = $request->all();
            $user = Auth::user();
            Session::forget('success');
            Session::forget('order');
            Session::forget('error');
            //$orderNumber = 'UPSKILL_' . uniqid();
            
            
            $lastID= Orders::orderBy('id', 'DESC')->first();

            
            if($lastID){
            $orderNumber = 'UPSKILL_' . ($lastID->id+1000);
            }else{
                $orderNumber = 'UPSKILL_1'; 
            }
            
            
            
            $carts = $this->cart->where('user_id', $user->id)->get();
            
            $credit = [];
            foreach ($carts as $key => $xCredit) {
                $product =  Product::where('id',$xCredit['product_id'])->first();
                $credit[] = $product['package_credit']*$xCredit['quantity'];
            }

            //\Stripe\Stripe::setApiKey('sk_test_51HHhvsLeAx37WVngR5ZdaOtLFWebX05aSqcf37e9oq7jN7Mg0LWj8NMpF2PMbZk8Lv8xTcX762JkAkJi3PTS98Ae00gPgv9Q78');

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            if(\Session::get('direct_login')){
                
                $customer = \Stripe\Customer::create(array(
                'name' => $requestData['first_name'].' '.$requestData['last_name'],
                'description' => 'Payment',
                'email' => $requestData['email'],
                'source' => $request->stripeToken,
               /* "address" => ["city" => $requestData['city'], "country" => $requestData['country'], "line1" => $requestData['billing_address_1'], "line2" => $requestData['billing_address_2'],   "state" => $requestData['state']]*/
                "address" => ["city" => 'San Francisco', "country" => 'US', "line1" => '510 Townsend St', "line2" => "",   "state" => 'CA']
                ));
            }else{
                $customer = \Stripe\Customer::create(array(
                'name' => $requestData['first_name'].' '.$requestData['last_name'],
                'description' => 'Payment',
                'email' => $requestData['email'],
                'source' => $request->stripeToken,
               "address" => ["city" => $requestData['city'], "country" => $requestData['country'], "line1" => $requestData['billing_address_1'], "line2" => $requestData['billing_address_2'],   "state" => $requestData['state']]
                 /*"address" => ["city" => 'San Francisco', "country" => 'US', "line1" => '510 Townsend St', "line2" => "",   "state" => 'CA']*/
             ));
            }

            



            $data=    \Stripe\Charge::create ([
                        'customer'=>$customer->id,
                        "amount" => str_replace(",","",$requestData['camount']) * 100,
                        "currency" => "usd",
                        //"source" => $request->stripeToken,
                        "description" => "UPSKILL" 
                ]);
            if(strtolower($data['status'])=='succeeded'){
                    //  Order Table Entry
                    $order = $this->order;
                    $order->order_number = $orderNumber;
                    $order->user_id = $user->id;
                    $order->first_name = $requestData['first_name'];
                    $order->middle_name = $requestData['middle_name'];
                    $order->last_name = $requestData['last_name'];
                    $order->email = $requestData['email'];
                    $order->company_name = $requestData['company_name'];
                    $order->company_title = $requestData['company_title'];
                    $order->mobile_no = $requestData['mobile_no'];
                    $order->mobile_no_2 = $requestData['mobile_no_2'];
                    $order->billing_address_1 = $requestData['billing_address_1'];
                    $order->billing_address_2 = $requestData['billing_address_2'];
                    $order->city = $requestData['city'];
                    $order->state = $requestData['state'];
                    $order->country = $requestData['country'];
                    $order->pincode = $requestData['pincode'];
                    $order->puchase_for_self = $requestData['puchase_for_self'];
                    $order->attendee_name = $requestData['puchase_for_self'] == 'yes' ? $requestData['attendee_name'] : '';
                    $order->attendee_email = $requestData['puchase_for_self'] == 'yes' ? $requestData['attendee_email'] : '';
                    $order->attendee_title = $requestData['puchase_for_self'] == 'yes' ? $requestData['attendee_title'] : '';
                    $order->attendee_no = $requestData['puchase_for_self'] == 'yes' ? $requestData['attendee_no'] : '';
                    $order->save();

                    //  Order Items Entry
                    foreach ($carts as $cart) {
                        $orderItems = $this->orderItems;
                        $orderItems->order_id = $order->id;
                        $orderItems->product_id = $cart->product_id;
                        $orderItems->quantity = $cart->quantity;
                        $orderItems->price = $cart->product->price;
                        $orderItems->save();

                        \Cart::remove($cart->product_id);
                    }

                    $this->cart->where('user_id', $user->id)->delete();
                    
                    // Insert data in CouponDetail table

                    if(Session::get('cpn')){
                    $cpnDetail= new CouponDetail();
                    $cpnDetail->user_id= $user->id;
                    $cpnDetail->order_id= $order->id;
                    $cpnDetail->cpn_id= Session::get('cpn');
                    $cpnDetail->cpn_price= Session::get('cpn_price');
                    $cpnDetail->save();
                        
                    Session::forget('cpn');
                    Session::forget('cpn_price');
                    }
                    
                    // update credit in user table

                    $usersCredit= User::where('id',$user->id)->first();
                    $usersCredit->credit= $usersCredit->credit+array_sum($credit);
                    $usersCredit->save();

                   //  Order Payment Entry
                    $payment = $this->paymentDetails;
                    $payment->order_id = $order->id;
                    $payment->card_number = $data['source']['last4'];
                    $payment->card_expiry_month = $data['source']['exp_month'];
                    $payment->card_expiry_year = $data['source']['exp_year'];
                    $payment->card_cvv_code = "";
                    $payment->card_amount = $data['amount']/100;
                    $payment->card_type = $data['source']['brand'];
                    $payment->auth_code = "";
                    $payment->transaction_id = $data['balance_transaction'];
                    $payment->response_code = $data['status']=='succeeded' ? 1 : 0;
                    $payment->account_number = "";
                    
                    if(\Session::get('direct_login')){
                        $payment->pay_type='admin';
                    }
                    
                    $payment->save();
                    Session::put('success', $data['outcome']['seller_message']);
                    Session::put('order', $order);

                    $this->data['user'] = $user;
                    $this->data['order'] = $this->order->with(['order_items', 'payment_details','coupon_detail'])->where('id', $order->id)->first();

                    //  Send Mail Confirmation
                    OrderConfirmationJob::dispatch($this->data)->onQueue(AppConstant::ORDER_CONFORM);

             }else{
                Session::put('error', $data['outcome']['seller_message']);
             }    
            
            DB::commit();
            return redirect('/order-confirmation');
        } catch (\Exception $exception) {
            Session::put('error', $exception->getMessage());
            DB::rollBack();
            return redirect('/order-confirmation');
        }
    }

    
}
