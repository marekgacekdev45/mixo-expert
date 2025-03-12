<section class='h-[250px] sm:h-[350px] relative text-white px-6 2xl:px-0 mt-28 sm:mt-32 overflow-hidden'>
    <img src="{{ asset('storage/' . $img) }}" alt="{{ $heading }}" class="absolute inset-0 -z-20 object-cover w-full h-full object-center" />
    <div class='absolute inset-0 -z-10 bg-black/30'></div>

    <div class='max-w-screen-2xl mx-auto flex flex-col justify-center items-start h-full gap-2'>
        <span class="text-xs sm:text-sm lg:text-base pl-3 uppercase font-bold relative after:content-[''] after:absolute after:right-[100%] after:top-1/2 after:-translate-y-1/2 after:bg-secondary-400 after:w-[1000px] after:h-[2px]">
            {!! $home->name !!}
        </span>
        <h1 class='text-4xl md:text-5xl uppercase font-bold'>{{ $heading }}</h1>
    </div>
</section>
