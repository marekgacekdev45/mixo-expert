@props(['href', 'activeRoute', 'scroll' => false])

@php
    $isActive = request()->routeIs($activeRoute);
    $baseClasses = 'flex items-center justify-center w-full h-full p-5 text-sm text-center duration-500';
    $hoverClasses = ' ';
    $scrollClasses = $scroll ? 'text-fontDark' : 'text-fontDark after:!bg-white';
    $activeClasses = $isActive ? 'underline' : '';

    $finalClasses = implode(' ', [$baseClasses, $hoverClasses, $scrollClasses, $activeClasses]);
@endphp

<li class="bg-primary-700 border-b border-primary-800 duration-300 hover:bg-primary-600 ">
    <a href="{{ $href }}" class="{{ $finalClasses }}">
        {{ $slot }}  
    </a>
</li>