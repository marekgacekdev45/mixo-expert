<div class='fixed top-0 inset-x-0  bg-primary-200 shadow-lg z-50 navbar--js duration-500'>
    <div class='flex max-w-screen-max mx-auto '>
        <a href='/' class=' flex justify-center items-center px-4 pl-4 lg:w-[20%] 2xl:w-[15%] bg-primary-400 '>
            <img src='{{asset('storage/' . $home->logo)}}' alt='{{$home->name}} - {{$home->address}}, {{$home->city}}'
            class="w-[100px]" />
        </a>

        <div class='w-full flex flex-col'>

            {{-- top --}}
            <div class='w-full flex justify-end items-center border-b border-primary-800 py-4 pr-4 lg:pr-8 '>


                <ul class='flex justify-end items-center '>
                    <li class='border-r  group'>
                        <a href='tel:+48{{$home->phone}}' class='topbar_link' aria-label='Zadzwoń'>
                            <x-lucide-phone class='topbar_link-icon ' />
                            <span class=' topbar_link-text link-hover--group !hidden md:!block text-sm'>+48
                                {{$home->phone}}</span>
                        </a>
                    </li>
                    <li class='border-r  lg:px-1 group'>
                        <a href='mailto:{{$home->email}}' class='topbar_link ' aria-label='Napisz'>

                            <x-lucide-mail class='topbar_link-icon ' />
                            <span class=' topbar_link-text link-hover--group !hidden md:!block text-sm'>{{$home->email}}</span>
                        </a>
                    </li>

                    @foreach ($socials as $social)
                    <li class=' pl-3 group '>
                        <x-socials :social="$social" dark />
                        </a>
                    </li>
                    @endforeach



                </ul>
                <x-header.language-switcher />


            </div>

            {{-- bottom --}}
            <div class='flex justify-end lg:justify-between items-center py-2 sm:py-4 pr-8 lg:pr-12 pl-12 2xl:pl-20 '>
                <nav class='hidden lg:block'>
                    <x-header.desktop.links />
                </nav>
                
                <x-link-btn href="{{route('contact')}}" label="kontakt" class='hidden lg:inline-flex '/>

                <x-header.mobile.hamburger class="lg:hidden" />

            </div>


        </div>
    </div>
</div>