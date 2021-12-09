@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{-- <img src="http://motoshop.fibergateproj.s-host.net/images/icons/logo-modal.png" class="logo" alt="Logo"> --}}
<img src="{{asset('/images/icons/logo-modal.png')}}" class="logo" alt="Logo">
<h1 style="text-align: center">{{ config('app.name') }}</h1>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
