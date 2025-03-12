@props(['title','href'])

<li class="relative group dropdown">

    <button class=" -left-[30px] absolute" aria-label="{{__('global.aria.dropdown')}}">
        <x-lucide-chevron-down class="w-6  text-white  duration-500 stroke-1 dropdownBtn--js" />
    </button>
    <a href="{{$href}}"
        class="text-fontLight nav__item  hover:text-secondary-200 duration-500  uppercase mobileNavItem--js">{{$title}}</a>


    <ul class=" flex flex-col gap-3 overflow-hidden max-h-0 transition-all duration-300 ease-in-out dropdownUl--js">
        {{$slot}}
    </ul>
</li>