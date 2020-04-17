@component('mail::message')

# User Feedback

<strong>From: </strong>{{$contact['email']}}<br>
<strong>Phone: </strong>{{$contact['phone_number']}}<br>
<hr>
<strong>Subject: </strong>{{$contact['subject']}}<br>
<hr>
<strong>Message: </strong><br>
{{$contact['message']}}<br>
<hr>
<strong>User: </strong>{{$contact['name']}}<br>

<!-- Thanks,<br>
{{ config('app.name') }} -->

@endcomponent
