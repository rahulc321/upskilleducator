@component('mail::message')
<?php
	 // echo '<pre>';print_r($order->payment_details->created_at);
	 ///echo date('Y-m-d H:i:s', strtotime($old_date));

    $pType= Session::get('product_type');
	 //die;
?>
 
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
        <table width="750" align="center" border="1" cellpadding="10" cellspacing="5">
            <tbody>
                <tr>
                    <td>
                    <center><span style="font-size:18pt"><strong style="color:#0066ff"></strong></span></center>
                    <div align="center">
                    <table border="1" cellspacing="0" cellpadding="0" width="640" style="width: 480pt; background: white; border: 1pt solid rgb(234, 234, 234);">
                        <tbody>
                            <tr>
                                <td style="border: none; padding: 6pt;">
                                <p><span style="font-family: Cambria, serif;"><img width="108" src="http://upskilleducator.com/assets/images/site-logo.png" height="47" alt="http://upskilleducator.com/assets/images/site-logo.png" v:shapes="Picture_x0020_2"></span> </p>
                                <div align="center" style=" text-align: center;"><span style="font-family: Cambria, serif;"> <hr size="1" width="100%" align="center">
                                </span></div>
                                <p style="margin-bottom: 12pt;"><span style="font-family: Cambria, serif;">Dear {{$user->fullname}},<br>
                                <br>
                                Thank you for your order. You may want to save or print this e-mail as your order confirmation and receipt.<br>
                                <br>
                                On behalf of everyone at <em><span style="font-family: Cambria, serif;">Upskill Educator</span></em>, thank you for your purchase! We welcome you to a very special group of people - an esteemed collection of professionals from across the country who know the value of our unique products, and share a common goal to run the office more efficiently and to improve bottom lines.<br>
                                <br>
                                <em><span style="font-family: Cambria, serif;">Upskill Educator</span></em> is the premier learning resource for business enhancing information. Our products and presentations are exclusively designed to thoroughly educate and guide the professionals and furnish them with all the useful and practical information needed to keep their business on the cutting edge.<br>
                                <br>
                                <strong><span style="font-family: Cambria, serif;">Please Note:</span></strong> If you have ordered live/on-demand audio conference or webinar, then you will receive dialing instructions 24 hours prior to the session. If you have ordered a DVD or Transcript, you can expect to receive your order within 15 days.<br>
                                <br>
                                * Your credit card statement will show this purchase under <strong><span style="font-family: Cambria, serif;">Remark Experts LLC.</span></strong> <em><span style="font-family: Cambria, serif;">Upskill Educator</span></em> is the dba of <strong><span style="font-family: Cambria, serif;">Remark Experts LLC.</span></strong></span></p>
                                <table border="1" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border: 1pt solid rgb(153, 153, 153);">
                                    <tbody>
                                        <tr>
                                            <td style="border: none; padding: 3pt;">
                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Date/Time:</span></strong> </p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{\Carbon\Carbon::parse($order->payment_details->created_at)->format('F d Y h:i A')}}</span></p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Invoice Number:</span></strong> </p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{ $order->order_number }}</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 3pt;">
                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Billed To:</span></strong> </p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">XXXX{{substr($order->payment_details->card_number, -4)}} ({{$order->payment_details->card_type}})</span></p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Transaction ID:</span></strong> </p>
                                            </td>
                                            <td style="border: none; padding: 3pt;">
                                            <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{$order->payment_details->transaction_id}}</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="border: none; padding: 3pt;">
                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Billed To Address:</span></strong> </p>
                                            </td>
                                            <td valign="top" style="border: none; padding: 3pt;">
                                            <p><span style="font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{ $order->first_name.' '.$order->last_name }}</span><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;"><br>
                                            </span><span><a href="mailto:{{ $order->email }}"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{ $order->email }}</span></a></span><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;"><br>
                                            Ph: {{ $order->mobile_no }}<br>
                                            <br>
                                           {{ $order->billing_address_1 }}</span></p>
                                            </td>


                                            <td valign="top" style="border: none; padding: 3pt;">


                                            <p><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Shipped To:</span></strong> </p>
                                            </td>
                                            <td valign="top" style="border: none; padding: 3pt;">
                                            <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{ @$order->attendee_name }}<br>
                                            <br>
                                           {{ @$order->attendee_email }}</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="border: none; padding: 3pt;">
                                            <table border="1" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; border: none;">
                                                <tbody>
                                                    <tr>
                                                        <td width="65%" style="width: 65%; border: 1pt inset silver; background: rgb(217, 242, 255); padding: 1.5pt;">
                                                        <p><em><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Product</span></em> </p>
                                                        </td>
                                                        <td width="5%" style="width: 5%; border-top: 1pt inset silver; border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-image: initial; border-left: none; background: rgb(217, 242, 255); padding: 1.5pt;">
                                                        <p><em><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Qty</span></em> </p>
                                                        </td>
                                                        <td width="15%" style="width: 15%; border-top: 1pt inset silver; border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-image: initial; border-left: none; background: rgb(217, 242, 255); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><em><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Price</span></em> </p>
                                                        </td>
                                                        <td width="15%" style="width: 15%; border-top: 1pt inset silver; border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-image: initial; border-left: none; background: rgb(217, 242, 255); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><em><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Total</span></em> </p>
                                                        </td>
                                                    </tr>

                                                    <?php
										            $total =array();
										             ?>
										            @foreach($order->order_items as $items)


										            <?php
                                                     
                                                    if($pType=='product'){
													$pName=  \App\Models\Program::where('id',$items->program_id)->first();

                                                    }

													?>

                                                    <tr>
                                                        <td style="border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-left: 1pt inset silver; border-image: initial; border-top: none; padding: 1.5pt;">
                                                        <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{ $items->product->title }} @if($pType=='product') ({{@$pName['program_name']}}) @endif</span></p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; padding: 1.5pt;">
                                                        <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{$items['quantity']}}</span></p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">
                                                            @if($pType=='product')
                                                            ${{$pName['price']}}
                                                            @else

                                                            {{$items->price}}
                                                            @endif

                                                        </span></p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">$

                                                        @if($pType=='product')
                                                        {{$pName['price']*$items['quantity']}}
                                                        @else
                                                        {{ $items->price * $items->quantity }}

                                                        @endif


                                                    </span></p>
                                                        </td>
                                                    </tr>

													@php

                                                    if($pType=='product')
													$total[] = str_replace(',', '', round($pName['price'], 0, PHP_ROUND_HALF_DOWN)) * $items['quantity'];

                                                    else
                                                    $total[] = str_replace(',', '', round($items->price, 0, PHP_ROUND_HALF_DOWN)) * $items->quantity;

                                                    
													@endphp

                                                     @endforeach
                                                    <tr>
                                                        <td colspan="3" style="border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-left: 1pt inset silver; border-image: initial; border-top: none; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Subtotal</span></strong> </p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">${{  number_format(array_sum($total)) }}</span></p>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                      
                                                    if(@$order->coupon_detail->cpn_price !=""){
                                                    ?>
                                                    <!-- for coupon -->
                                                    <tr>
                                                        <td colspan="3" style="border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-left: 1pt inset silver; border-image: initial; border-top: none; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Coupon Price</span></strong> </p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">${{@$order->coupon_detail->cpn_price}}</span></p>
                                                        </td>
                                                    </tr>
                                                    <!-- for coupon -->
                                                <?php } ?>

                                                    <tr>
                                                        <td colspan="2" rowspan="2" style="border-right: 1pt inset silver; border-bottom: 1pt inset silver; border-left: 1pt inset silver; border-image: initial; border-top: none; padding: 1.5pt;"></td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Shipping</span></strong> </p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">$0.00</span></p>
                                                        </td>
                                                    </tr>





                                                    <tr>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><strong><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Total</span></strong> </p>
                                                        </td>
                                                        <td style="border-top: none; border-left: none; border-bottom: 1pt inset silver; border-right: 1pt inset silver; background: rgb(238, 238, 238); padding: 1.5pt;">
                                                        <p align="right" style="text-align: right;"><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">$
                                                            @if(@$order->coupon_detail->cpn_price)
                                                            {{  number_format(array_sum($total)-@$order->coupon_detail->cpn_price) }}

                                                            @else
                                                            {{  number_format(array_sum($total)) }}

                                                            @endif

                                                        </span></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p> </p>
                                <p align="center" style="text-align: center;"><span>---------------------: </span><strong><span style="font-size: 13.5pt; line-height: 106%; font-family: Calibri, sans-serif;">Attendee(s) Information</span></strong><span> :---------------------<br>
                                (Participants who will be attending the session)</span></p>
                                <table border="1" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; border: none;">
                                    <tbody>
                                        <tr>
                                            <td style="border: 1pt inset rgb(153, 153, 153); background: rgb(217, 242, 255); padding: 1.5pt;">
                                            <p><em><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Participant Name</span></em> </p>
                                            </td>
                                            <td style="border-top: 1pt inset rgb(153, 153, 153); border-right: 1pt inset rgb(153, 153, 153); border-bottom: 1pt inset rgb(153, 153, 153); border-image: initial; border-left: none; background: rgb(217, 242, 255); padding: 1.5pt;">
                                            <p><em><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Email ID</span></em> </p>
                                            </td>
                                            <td style="border-top: 1pt inset rgb(153, 153, 153); border-right: 1pt inset rgb(153, 153, 153); border-bottom: 1pt inset rgb(153, 153, 153); border-image: initial; border-left: none; background: rgb(217, 242, 255); padding: 1.5pt;">
                                            <p><em><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Phone</span></em> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php

                                            if($order->puchase_for_self=='no'){
                                                $name= $order->attendee_name;
                                                $email= $order->attendee_email;
                                                $phone= $order->attendee_no;
                                            }else{
                                                $name= $order->first_name;
                                                $email= $order->email;
                                                $phone= $order->mobile_no;; 
                                            }


                                            ?>
                                            <td style="border-right: 1pt inset rgb(153, 153, 153); border-bottom: 1pt inset rgb(153, 153, 153); border-left: 1pt inset rgb(153, 153, 153); border-image: initial; border-top: none; background: white; padding: 1.5pt;">
                                            <p><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{$name}}</span></p>
                                            </td>
                                            <td style="border-top: none; border-left: none; border-bottom: 1pt inset rgb(153, 153, 153); border-right: 1pt inset rgb(153, 153, 153); background: white; padding: 1.5pt;">
                                            <p><span><a href="mailto:{{$email}}"><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{$email}}</span></a></span> </p>
                                            </td>
                                            <td style="border-top: none; border-left: none; border-bottom: 1pt inset rgb(153, 153, 153); border-right: 1pt inset rgb(153, 153, 153); background: white; padding: 1.5pt;">
                                            <p><span style="font-size: 9pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">{{$phone}}</span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="margin-bottom: 12pt;"> </p>
                                <div align="center" style=" text-align: center;"><span> <hr size="1" width="100%" align="center">
                                </span></div>
                                <p><span style="font-size: 10pt; line-height: 106%; font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;"><br>
                                Thanks again for your order.<br>
                                <br>
                                Sincerely,<br>
                                Customer Service<br>
                                <strong><span style="font-family: &quot;Lucida Sans Unicode&quot;, sans-serif;">Upskill Educator,</span></strong><br>
                                1414, 154th Ave NE APT 4404 Bellevue,&nbsp;<br>
                                WA 98007-4582,&nbsp;USA<br>
                                Phone: 1 888-407-9644<br>
                                </span> </p>
                                <div align="center" style="text-align: center;"><span> <hr size="1" width="100%" align="center">
                                </span></div>
                                <p style="line-height: 106%;"><span>Upskill Educator, 1414, 154th Ave NE APT 4404 Bellevue,&nbsp;WA 98007-4582,&nbsp;USA<br>
                                Toll Free: 1 888-407-9644 | E-mail: <a href="mailto:support@upkilleducator.com">support@upkilleducator.com</a></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <p> </p>
                    <br>
                    <font style="font-size:13pt">
                    <br>
                    </font></td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>
</html> 
		  

 
{{ config('app.name') }}
@endcomponent  
