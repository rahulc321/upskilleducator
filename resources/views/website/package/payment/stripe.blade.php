@extends('website.layouts.app')

@section('title')
    Payment Details - Up Skill Educator
@endsection

@section('content')
	<title>UPSKILL | Payment</title>
     <link rel="shortcut icon" href="https://upskilleducator.com/assets/images/site-logo.png" type="image/x-icon"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body style="background-image: url('https://i.ibb.co/wh39Tv9/ecommerce-2607114-1920.jpg');background-size: 1299px auto;">
  
<div class="container">
  
   <!--  <h1>Laravel 5 - Stripe Payment Gateway Integration Example <br/> ItSolutionStuff.com</h1> -->
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="//i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    <style type="text/css">
                        .panel.panel-default.credit-card-box {
                        paddig-top: 16px;
                        margin-top: 32px;
                        }
                        .checkout-button {
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%);
    color: #fff;
    width: 100%;
    float: left;
    text-align: center;
    padding: 11px 0;
    margin-top: 27px;
    text-decoration: none;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 16px;
}
                    </style>
   
                    <form role="form" action="{{ url('/package-card-payment') }}"  method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                   data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf
                        <input type="hidden" name="first_name" value="{{ $checkout_data['name'] }}">
                                <input type="hidden" name="middle_name" value="{{ $checkout_data['middle_name'] }}">
                                <input type="hidden" name="last_name" value="{{ $checkout_data['last_name'] }}">
                                <input type="hidden" name="email" value="{{ $checkout_data['email'] }}">
                                <input type="hidden" name="mobile_no" value="{{ $checkout_data['phone_1'] }}">
                                <input type="hidden" name="mobile_no_2" value="{{ $checkout_data['phone_2'] }}">
                                <input type="hidden" name="billing_address_1"
                                       value="{{ $checkout_data['billing_address_1'] }}">
                                <input type="hidden" name="billing_address_2"
                                       value="{{ $checkout_data['billing_address_1'] }}">
                                <input type="hidden" name="city" value="{{ $checkout_data['city'] }}">
                                <input type="hidden" name="state" value="{{ $checkout_data['state'] }}">
                                <input type="hidden" name="country" value="{{ $checkout_data['country'] }}">
                                <input type="hidden" name="pincode" value="{{ $checkout_data['pincode'] }}">
                                <input type="hidden" name="puchase_for_self"
                                       value="{{ $checkout_data['puchase_for_self'] }}">
                                <input type="hidden" name="attendee_name" value="{{ $checkout_data['attendee_name'] }}">
                                <input type="hidden" name="attendee_email"
                                       value="{{ $checkout_data['attendee_email'] }}">
                                <input type="hidden" name="attendee_title"
                                       value="{{ $checkout_data['attendee_title'] }}">
                                <input type="hidden" name="attendee_no" value="{{ $checkout_data['attendee_no'] }}">
                                <input type="hidden" name="company_name" value="{{ $checkout_data['company_name'] }}">
                                <input type="hidden" name="company_title" value="{{ $checkout_data['company_title'] }}">
                                <!--<input type="hidden" class="form-control" name="camount"-->
                                <!--           value="{{ $checkout_data['total'] }}">-->
                                
                                 <?php if(\Session::get('direct_login')=='direct'){ ?>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Product Amount <i style="color:green">(You can change Real Amount of Product Amount (${{$checkout_data['total']}}))</i></label>
                                <input type="text" class="form-control act" name="camount"
                                           value="{{ $checkout_data['total'] }}">
                                    <div class="dpaym"></div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" class="form-control act" name="camount"
                                           value="{{ $checkout_data['total'] }}">
                    <?php  } ?>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4'   type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' >
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'  >
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'  >
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' >
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                         <!--Google recapcha-->
                        <!--<div class="g-recaptcha" data-sitekey="6LcLIsgZAAAAAC251_mbR4DJnnYj6_RNXTToa4RB" data-callback="correctCaptcha"></div>-->

                        <!--<div class="recapchaerr" style="color:red">Please Verify reCAPCHA !!!</div>-->
                        <!--Google recapcha-->
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn checkout-button site-btn btn-lg btn-block" type="submit">Pay Now <span class="amount">(${{$checkout_data['total']}})</span></button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    
    $('.act').keyup(function(){
        var act = $(this).val();
        var act1= "{{ str_replace(",","",$checkout_data['total']) }}"

        $('.amount').html("($"+act+")")
        if(parseInt(act) > parseInt(act1)){
            //alert('Please Enter Less value of Amount!!');
            $('.dpaym').html('Please Enter Less value of Amount !!!').css('color','red ');
            $('.btn').prop('disabled',true);
        }else{
            $('.dpaym').html(' ')
            $('.btn').prop('disabled',false);
        }
    });
    
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
    
    
    //  // recapcha
    //   var response = grecaptcha.getResponse();
    //       //recaptcha failed validation
    //       if(response.length == 0) {
    //           e.preventDefault();
    //           $('.recapchaerr').show();
    //       }
    //       //recaptcha passed validation
    //       else {
    //           $('.recapchaerr').hide();
    //       }
    //       if (e.isDefaultPrevented()) {
    //           return false;
    //       } else {
    //           return true;
    //       }
    
    
    
    // recapcha
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection