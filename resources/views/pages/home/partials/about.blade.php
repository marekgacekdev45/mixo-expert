<section id="{{__('global.anchor.about')}}" class='pt-5 sm:pt-10 pb-10 '>
    <div class='wrapper'>
        <div class='grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-26 2xl:gap-20 justify-center items-center '>
            <div
                class='relative max-w-[550px] h-[350px] sm:h-[500px] max-h-[650px] mx-4 sm:mx-auto lg:mx-8 lg:ml-16 lg:h-full '>
                <div class='absolute w-full h-full rotate-[10deg] lg:rotate-[13deg]  top-0 left-0'>
                    <Img src="{{asset('storage/' . $home->hero_background)}}" alt='tło' priority class='w-full h-full
                    object-cover' />
                </div>
                <img src="{{asset('storage/' . $home->about_image)}}"
                alt="{!!$home->about_heading!!}"

                class='h-full relative z-10 object-cover'
                />
            </div>

            <div
                class='flex flex-col justify-start items-start mx-auto text-left space-y-1 sm:py-12 lg:pr-12 2xl:pr-20'>
                <span class='preheading'>{!!$home->about_subheading!!}</span>
                <h2 class='heading '>{!!$home->about_heading!!}</h2>
                <div class='text pt-4 pb-6 sm:pb-10'>
                    {!!$home->about_text!!}
                </div>

                <x-link-btn href="{{route('contact')}}" label="{{__('global.button.contact')}}"/>

            </div>
        </div>
    </div>
</section>