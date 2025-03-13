
@props([
    'route' => null, 
    'scroll' => false, 
    'dropdown' => false, 
    'title' => null, 
    'activeRoute' => null,
    'href'=>null,
])

@php
    $baseClasses = 'uppercase text-lg font-bold text-black inline-block link-hover';
    $hoverClass = $route !== 'home' ? 'link-hover' : '';

    $finalClasses = implode(' ', [$baseClasses, $hoverClass]);
@endphp

@if($dropdown)
    <li class="relative group flex justify-center items-center gap-1">
        @if($href)
            <a href="{{ $href }}" class="{{ $finalClasses }} hover:text-secondary-600 duration-300">
                {{ $title }}
            </a>
        @else
            <span class="{{ $finalClasses }} hover:text-secondary-600 duration-300">
                {{ $title }}
            </span>
        @endif
        <x-iconpark-down class="w-4" />
        {{ $slot }}
    </li>
@else
    <li>
        <a href="{{ $href }}" class="{{ $finalClasses }} hover:text-secondary-600 duration-300" aria-label=" {{ $title }}">
            {{ $title }}
        </a>
    </li>
@endif