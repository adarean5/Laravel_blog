@component('mail::message')
# Introduction

The body of your message.

-one
-two
-three

@component('mail::button', ['url' => ''])
Start browsing
@endcomponent

@component('mail:panel', ['url' => ''])
    Panel component
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
