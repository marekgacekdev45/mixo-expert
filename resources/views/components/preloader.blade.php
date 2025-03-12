@props(['home'])

<div 
    class="fixed inset-0 flex flex-col justify-center items-center gap-y-1 bg-primary-200 transition-opacity duration-1000 ease-in-out preloader--js"
    style="z-index: 1000000">

    <img src="{{ asset('storage/'.$home->logo) }}"alt='{{$home->name}} - {{$home->address}}, {{$home->city}}'
        class="w-[150px]  md:w-[200px]" />


</div>