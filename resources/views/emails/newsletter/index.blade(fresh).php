@component('mail::message')
# Dear User,

Thank you for subscribing us. our team will contact you soon.

#For any further help contact us on :
#Email : <a href="mailto:upskileducator@gmail.com">upskileducator@gmail.com</a>
#Contact Number : <a href="tel:+1-202-555-0126">+1-202-555-0126</a>

@component('mail::button', ['url' => url('/register')])
Go To Registration
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
