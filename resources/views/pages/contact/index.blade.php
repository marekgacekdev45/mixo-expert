<x-layouts.app title="{{$content->meta_title}}" description="{{$content->meta_description}}"
   >

    <x-hero img="{{$content->hero_image}}" heading="{{$content->hero_heading}}" />


    <section class='mt-5 sm:mt-10 mb-20  xl:mt-12 '>
        <div class='wrapper !max-w-screen-2xl   grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-6 2xl:gap-0 !relative'>
            <img src="{{$home->hero_background}}" alt='tło' class='absolute inset-0 -z-20 object-cover w-full h-full ' />
            <div class='absolute inset-0 -z-10 bg-black/80 '></div>

            <div class='flex flex-col justify-center items-start  sm:px-6 xl:px-16 pt-20 lg:py-20'>
                <h2 class='heading  !text-white'>{!!$content->heading!!}</h2>
                <div class='text pt-4   prose-content !text-white prose-strong:!text-white'>
                    {!!$content->text!!}
                </div>


                <hr class='border border-white w-full border-dashed my-12' />

                <h3 class='text-xl font-black text-white uppercase'>{{__('global.menu.contact')}}</h3>
                <ul class='flex flex-col justify-start items-start gap-6 pt-6'>
                    <li>
                        <a href='tel:+48{{$home->phone}}' class='topbar_link group !p-0' aria-label='Zadzwoń'>
                            <x-lucide-phone class='topbar_link-icon !size-7 !text-secondary-400' />
                            <span class=' topbar_link-text link-hover--group after:!bg-white !text-white !text-lg'>
                                {{$home->phone}}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href='mailto:{{$home->email}}' class='topbar_link group !p-0' aria-label='Napisz'>
                            <x-lucide-mail class='topbar_link-icon !size-7 !text-secondary-400' />
                            <span class=' topbar_link-text link-hover--group after:!bg-white !text-white !text-lg'>
                                {{$home->email}}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href='{{$home->google_link}}' target='_blank' rel='noreferrer nofollow'
                            class='topbar_link group !p-0' aria-label='Zobacz adres'>
                            <x-lucide-map-pin class='topbar_link-icon !size-7 !text-secondary-400' />
                            <span class='topbar_link-text link-hover--group after:!bg-white !text-white !text-lg'>
                                {{$home->address}} {{$home->city}}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class='flex  justify-center items-center   sm:px-6 xl:px-16 pb-20 lg:py-20'>
                <livewire:contact-form />
            </div>
        </div>
    </section>


</x-layouts.app>