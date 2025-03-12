<section class=' py-16 sm:pb-24 lg:py-32 '>
    <div class='wrapper'>
        <div class='grid grid-cols-1 lg:grid-cols-2 gap-20 xl:gap-26 2xl:gap-20 justify-center items-center '>
            <div class='flex flex-col justify-start items-start mx-auto text-left space-y-1 sm:py-12 lg:pl-12 2xl:pl-20'>
                <span class='preheading'>{!!$home->realisations_subheading!!}</span>
                <h2 class='heading '>{!!$home->realisations_heading!!}</h2>
                <div class='text pt-4 pb-6 sm:pb-10'>
                    {!!$home->realisations_text!!}
                </div>
           

                <x-link-btn href="{{route('realisations.index')}}" label="Realizacje"/>
            </div>

            <div class='relative max-w-[550px] h-[350px] sm:h-[500px] max-h-[650px] mx-4 sm:mx-auto lg:mx-8  lg:h-[600px] '>
                <div class='absolute w-full h-full rotate-[10deg] lg:rotate-[13deg]  top-0 left-0'>
                    <img src={{asset('storage/' . $home->realisations_background)}} alt='tło' priority class='w-full h-full object-cover' />
                </div>
                <img
                src={{asset('storage/' . $home->realisations_image)}}
                    alt='wyposażenie dla gastronomii w sklepie Bentto'
                  
                    class='h-full relative z-10 object-cover'
                />
            </div>
        </div>
    </div>
</section>