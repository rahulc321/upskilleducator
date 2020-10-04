@component('mail::message')
# Hello Administrator

Contact Details :

<p>FulName : <strong>{{ $contact['fullname'] }}</strong></p>
<p>Email : <strong>{{ $contact['email'] }}</strong></p>
<p>Contact Number : <strong>{{ $contact['number'] }}</strong></p>
<p>Subject : <strong>{{ $contact['subject'] }}</strong></p>
<p>Message : <strong>{{ $contact['message'] }}</strong></p>


Thanks,<br>
Upskill Educator.
@endcomponent
