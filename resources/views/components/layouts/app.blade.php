@props(['title', 'description', 'noFollow' => false,'ogImage'=>null,'seo'=>false])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	

    @if($home->scripts_head_top)
    {!!$home->scripts_head_top!!}
    @endif

    @include('partials.meta')
    @include('partials.fonts')
    @include('partials.favicon')
    @include('partials.seo')

    {!! $seo ?? '' !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if($home->scripts_head_bottom)
    {!!$home->scripts_head_bottom!!}
    @endif
</head>

<body>
    @if($home->scripts_body_top)
    {!!$home->scripts_body_top!!}
    @endif

    
    <x-preloader />
   
 


    <header>
        <x-header.navbar />
        <x-header.navbar-scroll />
        <x-header.mobile.menu />
    </header>


    <main>
        {{ $slot }}
    </main>

    <x-footer />
    <x-scroll-to-top />

 
</body>

</html>