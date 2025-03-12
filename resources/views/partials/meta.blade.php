<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{!! $title !!}</title>
<meta name="description" content="{!! $description !!}">

<meta name="keywords" content="{!!$home->keywords!!}">

<meta name="author" content="marketingmix.pl">

{{-- @if ($noFollow)
<meta name="robots" content="noindex, nofollow">
@else
<meta name="robots" content="index, follow">
@endif --}}

<meta name="robots" content="noindex, nofollow">


<link rel="canonical" href="{{ url()->current() }}" />

<meta property="og:title" content="{!! $title !!}">
<meta property="og:description" content="{!! $description !!}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($ogImage) && $ogImage ? asset('storage/'.$ogImage) : asset('storage/'.$home->og_image) }}"> 
 <meta property="og:logo" content="{{$home->logo}}" />