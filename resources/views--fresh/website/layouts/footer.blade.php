<footer id="footerCntr">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 intro">
                <a href="#" class="logo"><img src="{{ url('assets/images/site-logo.png') }}" alt="image"></a>
                <p>
                    Upskill educator brings together the domain experts to ensure that you get the right learning to
                    jump start your career. We ensure that there are no middlemen, to ensure you connect with the best
                    in the business without making a huge dent in your pocket. Now get the right dose of learning to
                    ensure you stay abreast with all the relevant updates happening in your industry.
                </p>
            </div>
            <div class="col-xs-12 col-sm-2 link">
                <h3>Resources</h3>
                <ul>
                    <li><a href="{{ url('about-us') }}">About Us</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ url('fags') }}">FAQ's</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-2 link">
                <h3>Resources</h3>
                <ul>
                    <li><a href="{{ url('terms-of-use') }}">Terms of Use</a></li>
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('refund-policy') }}">Refund Policy</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 get-touch">
                <h3>Subscribe Newsletter</h3>
                <p>Enter your email and we'll send you more information</p>
                <form action="{{ url('subscribe') }}" method="post">
                    @csrf
                    <input type="text" required class="fstyle" name="subscribe_email" placeholder="You Email">
                    <input type="submit" value="SUBSCRIBE" class="sub-btn">
                </form>
                <br/>
                <p><img src="{{ url('assets/images/payment_methods.png') }}" alt="payment_methods.png"></p>
            </div>
        </div>
        <div class="copyrightBox">
            &copy; Upskilleducator.com {{ date('Y') }} - All rights reserved.
        </div>
    </div>
</footer>
