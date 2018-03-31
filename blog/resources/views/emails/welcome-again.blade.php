@component('mail::message')
# Introduction

Welcome to Laracasts

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some inspirational text goes here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
