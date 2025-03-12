<footer>
   {!!$home->google_map!!}

    <div class='bg-black shadow-lg pt-16 lg:pt-24 pb-12 text-fontLight'>
        <div class='wrapper !max-w-screen-xl space-y-12'>
            <div class='flex flex-col lg:flex-row gap-12'>
                <div class='lg:w-[40%] xl:w-1/2 mx-auto'>
                    <a href='{{route('home')}}'>
                        <img src='{{asset('storage/' . $home->logo)}}' alt='{{$home->name}} - {{$home->address}}, {{$home->city}}' class="w-[150px]"/>
                    </a>
                </div>
                <div class='lg:w-[60%] xl:w-1/2  flex flex-col sm:flex-row justify-center items-center sm:items-start sm:justify-between gap-6 sm:gap-0'>
                    <div class='sm:w-1/3 text-center sm:text-left'>
                        <h2 class='text-2xl font-bold  mb-4 text-secondary-400'>Menu</h2>
                        <ul class='flex flex-col justify-center items-center sm:justify-start sm:items-start gap-3'>
                            <li>
                                <a href='{{ route('home') .'#o-nas' }}' class='link-hover font-medium'>
                                    O nas
                                </a>
                            </li>
                            <li>
                                <a href='{{ route('home') .'#oferta' }}' class='link-hover font-medium'>
                                    Oferta
                                </a>
                            </li>
                          
                            <li>
                                <a href='{{route('realisations.index')}}' class='link-hover font-medium'>
                                    Realizacje
                                </a>
                            </li>
                            <li>
                                <a href='{{route('gallery')}}' class='link-hover font-medium'>
                                    Galeria
                                </a>
                            </li>
                            <li>
                                <a href='{{route('contact')}}' class='link-hover font-medium'>
                                    Kontakt
                                </a>
                            </li>
                            <li>
                                <a href='{{ route('privacyPolicy') }}' class='link-hover font-medium'>
                                    Polityka prywatności
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class='sm:w-1/3 text-center sm:text-left'>
                        <h2 class='text-2xl font-bold  mb-4 text-secondary-400'>Kontakt</h2>
                        <ul class='flex flex-col justify-center items-center sm:justify-start sm:items-start gap-3'>
                            <li>
                                <a href='tel:+48602270903' class='topbar_link group !p-0 ' aria-label='Zadzwoń'>
                                    <x-lucide-phone class='topbar_link-icon' />
                                    <span class=' topbar_link-text link-hover--group '>+48 602-270-903</span>
                                </a>
                            </li>
                            <li>
                                <a href='mailto:bentto@onet.eu' class='topbar_link group !p-0' aria-label='Napisz'>
                                    <x-lucide-mail class='topbar_link-icon ' />
                                    <span class=' topbar_link-text link-hover--group'>bentto@onet.eu</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href='https://maps.app.goo.gl/LpyzjWDadgucufKh8'
                                    target='_blank'
                                    rel='noreferrer nofollow'
                                    class='topbar_link group !p-0'
                                    aria-label='Zobacz adres'>
                                    <x-lucide-map-pin class='topbar_link-icon' />
                                    <span class='topbar_link-text link-hover--group'>Szaflarska 61,<br/> Nowy Targ</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class='sm:w-1/3 sm:pl-16 text-center sm:text-left'>
                        <h2 class='text-2xl font-bold mb-4 text-secondary-400'>Social </h2>
                        <ul class='flex  justify-center items-center sm:justify-start sm:items-start gap-3 '>
                            @foreach ($socials as $social)
                            <li>
                                <x-socials :social='$social'/>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr class='border-primary-800' />

          
            <div class='flex  flex-col sm:flex-row justify-center items-center sm:items-start sm:justify-between gap-2 sm:gap-0'>
                <p class="text-white">{{$home->name}}
                    © <span class="footerYear--js"><span> 
                </p>

                <div class='flex gap-2'>
                    <p>Hand coded by </p>
                    <a href='https://marekgacekdev.pl' target='_blank' class='link-hover font-medium'>
                        Marek Gacek
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>