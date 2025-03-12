@props(['class' => '','scroll' => false])

<button  class="flex flex-col gap-[8px] w-[60px] group p-2 cursor-pointer {{$class}} hamburger--js " aria-label="otwórz menu">
    <span class="w-full h-[2px] {{$scroll ? 'bg-primary-400 group-hover:bg-primary-400' : 'bg-secondary-400'}}   duration-500 origin-left transform group-hover:scale-x-50"></span>
    <span class="w-full h-[2px]  {{$scroll ? 'bg-primary-400 group-hover:bg-primary-400' : 'bg-secondary-400'}}  duration-500"></span>
    <span class="w-full h-[2px]  {{$scroll ? 'bg-primary-400 group-hover:bg-primary-400' : 'bg-secondary-400'}}  duration-500 origin-right transform group-hover:scale-x-50"></span>
</button>