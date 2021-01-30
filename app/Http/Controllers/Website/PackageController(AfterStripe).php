<?php

namespace App\Http\Controllers\Website;

use App\Jobs\OrderConfirmationJob;
use App\Models\CartProduct;
use App\Models\CityStateCountry;
use App\Models\OrderItems;
use App\Models\Cartnew;
use App\Models\OrderPaymentDetails;
use App\Models\Orders;
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
        return view('website.package.payment.index', $this->data);
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
            $orderNumber = 'UPSKILL_' . ($lastID->id+1);
            }else{
                $orderNumber = 'UPSKILL_1'; 
            }
            
            
            
            $carts = $this->cart->where('user_id', $user->id)->get();

            /*$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(config('services.authorize.login'));
            $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
            $refId = 'ref' . time();

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($request->cnumber);

            // $creditCard->setExpirationDate( "2038-12");
            $expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
            $creditCard->setExpirationDate($expiry);
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);

            // Create a transaction
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($request->camount);
            $transactionRequestType->setPayment($paymentOne);
            $request = new AnetAPI\CreateTransactionRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);
            $controller = new AnetController\CreateTransactionController($request);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);*/

            /* Create a merchantAuthenticationType object with authentication details
            retrieved from the constants file */
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(config('services.authorize.login'));
            $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

            // Set the transaction's refId
            $refId = 'ref' . time();

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($request->cnumber);
            $date = $request->card_expiry_year . '-' . $request->card_expiry_month;
            $creditCard->setExpirationDate($date);
            $creditCard->setCardCode($request->ccode);

            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);

            // Create order information
//            $order = new AnetAPI\OrderType();
//            $order->setInvoiceNumber("");
//            $order->setDescription("");

            // Set the customer's Bill To address
            $customerAddress = new AnetAPI\CustomerAddressType();
            $customerAddress->setFirstName($request->first_name);
            $customerAddress->setLastName($request->last_name);
            $customerAddress->setCompany("");
            $customerAddress->setAddress($request->billing_address_1 . ', ' . $request->billing_address_2);
            $customerAddress->setCity($request->city);
            $customerAddress->setState($request->state);
            $customerAddress->setZip($request->pincode);
            $customerAddress->setCountry($request->country);

            // Set the customer's identifying information
            $customerData = new AnetAPI\CustomerDataType();
            $customerData->setType("individual");
            $customerData->setId($user->id);
            $customerData->setEmail($user->email);

            // Add values for transaction settings
//            $duplicateWindowSetting = new AnetAPI\SettingType();
//            $duplicateWindowSetting->setSettingName("duplicateWindow");
//            $duplicateWindowSetting->setSettingValue("60");
//
//            // Add some merchant defined fields. These fields won't be stored with the transaction,
//            // but will be echoed back in the response.
//            $merchantDefinedField1 = new AnetAPI\UserFieldType();
//            $merchantDefinedField1->setName("customerLoyaltyNum");
//            $merchantDefinedField1->setValue("1128836273");
//
//            $merchantDefinedField2 = new AnetAPI\UserFieldType();
//            $merchantDefinedField2->setName("favoriteColor");
//            $merchantDefinedField2->setValue("blue");

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authOnlyTransaction");
            $transactionRequestType->setAmount($request->camount);
//            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);
            $transactionRequestType->setBillTo($customerAddress);
            $transactionRequestType->setCustomer($customerData);
//            $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
//            $transactionRequestType->addToUserFields($merchantDefinedField1);
//            $transactionRequestType->addToUserFields($merchantDefinedField2);

            // Assemble the complete transaction request
            $request = new AnetAPI\CreateTransactionRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);

            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($request);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            $message = $response->getMessages()->getMessage();

            if ($response != null) {
                $tresponse = $response->getTransactionResponse();
                if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
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

                    //  Order Payment Entry
                    $payment = $this->paymentDetails;
                    $payment->order_id = $order->id;
                    $payment->card_number = $requestData['cnumber'];
                    $payment->card_expiry_month = $requestData['card_expiry_month'];
                    $payment->card_expiry_year = $requestData['card_expiry_year'];
                    $payment->card_cvv_code = $requestData['ccode'];
                    $payment->card_amount = $requestData['camount'];
                    $payment->card_type = $tresponse->getAccountType();
                    $payment->auth_code = $tresponse->getAuthCode();
                    $payment->transaction_id = $tresponse->getTransId();
                    $payment->response_code = $tresponse->getResponseCode();
                    $payment->account_number = $tresponse->getAccountNumber();
                    $payment->save();
                    Session::put('success', $message[0]->getText());
                    Session::put('order', $order);

                    $this->data['user'] = $user;
                    $this->data['order'] = $this->order->with(['order_items', 'payment_details','coupon_detail'])->where('id', $order->id)->first();

                    //  Send Mail Confirmation
                   OrderConfirmationJob::dispatch($this->data)->onQueue(AppConstant::ORDER_CONFORM);

                } else {
                    Session::put('error', $message[0]->getText());
                }
            } else {
                Session::put('error', $message[0]->getText());
            }
            DB::commit();
            return redirect('/order-confirmation');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            return redirect('/');
        }
    }

    
}
