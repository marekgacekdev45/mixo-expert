
@props(['href','label','class'=>''])

<a href="{{$href}}" aria-label="{{$label}}"
class='{{$class}} px-8 py-2.5 overflow-hidden relative group cursor-pointer border-2 font-semibold border-secondary-600 text-white bg-secondary-600 uppercase '>

<span
    class='absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-white top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease'></span>
<span class='relative text-white transition duration-300 group-hover:text-secondary-600 ease'>{{$label}}</span>
</a>