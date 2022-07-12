@component('mail::message')

    Dear {{$data['Name']}},

    Below is our prescription. <br>

    {{ $data['Meds'] }}
    <br>
    Please be regular <br>

    Best Regards, <br>
    {{ $data['Doc'] }} <br>
@endcomponent
