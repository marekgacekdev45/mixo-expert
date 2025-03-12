<section class='relative lg:h-screen pt-40 md:pt-48 lg:pt-42 2xl:pt-40  mb-10 '>
    <div class='hidden lg:block absolute inset-y-0 left-[62%] right-0 -z-10'>
        <Image     src={{asset('storage/' . $home->hero_background)}} alt='tło' priority class='w-full h-full object-cover' />
    </div>
    <div class='wrapper h-full grid grid-cols-1 lg:grid-cols-2 gap-12 2xl:gap-16 '>
       
        <div class='flex flex-col justify-center items-center lg:items-start text-center lg:text-left '>
            <h1 class='heading  xl:!text-5xl'>
                {!!$home->hero_heading!!}
            </h1>
            <p class='text md:!text-xl mt-6'>
                {!!$home->hero_text!!}
            </p>
            <x-link-btn href="#{{__('global.anchor.offer')}}" label="{{__('global.button.offer')}}" class='mt-12' />

            <ul class='flex flex-wrap sm:flex-nowrap justify-center lg:justify-start items-center mt-12 md:mt-16 w-full gap-6 md:gap-12'>
                <li class='flex flex-col'>
                    <span class='text-3xl sm:text-4xl xl:text-5xl font-bold text-black uppercase'>25+</span>
                    <span class='sm:text-lg'>{{__('global.hero.first')}}</span>
                </li>
                <li class='flex flex-col'>
                    <span class='text-3xl sm:text-4xl xl:text-5xl font-bold text-black uppercase'>100%</span>
                    <span class='sm:text-lg'>{{__('global.hero.second')}}</span>
                </li>
                <li class='flex flex-col'>
                    <span class='text-3xl sm:text-4xl xl:text-5xl font-bold text-black uppercase'>5/5</span>
                    <span class='sm:text-lg'>{{__('global.hero.third')}}</span>
                </li>
            </ul>
        </div>
       
        <img
            src="{{asset('storage/' . $home->hero_image)}}"
            alt="{{$home->name}} - {{$home->address}}, {{$home->city}}"
            class='sm:mb-24 md:mb-0 lg:pb-20  mx-auto max-w-[600px] aspect-[4/3] lg:aspect-auto lg:h-3/4 xl:h-[100%] 2xl:h-[94%] w-full xl:w-[90%]  my-auto object-cover lg:p-6'
        />
    </div>
</section>