



<div class='fixed top-0 inset-x-0  bg-primary-200 shadow-lg z-50 -translate-y-[100%]  duration-500 navbarScroll--js'>



    <div class='flex max-w-screen-max mx-auto justify-between'>
      

       

            
            <a href='/' class=' flex justify-center items-center px-4 pl-4 lg:w-[20%] 2xl:w-[10%] bg-primary-400 '>
                <img src='{{asset('assets/logo.png')}}' alt='Bentto - Urządzenia Gastronomiczne' class="w-[75px] p-2" />
            </a>

            {{-- bottom --}}
            <div class='flex justify-end lg:justify-between items-center py-2 sm:py-4 pr-8 lg:pr-12 pl-12 2xl:pl-20 gap-12 w-full'>
                <nav class='hidden lg:block'>
                 <x-header.desktop.links/>
                </nav>
               
                <x-link-btn href="{{route('contact')}}" label="kontakt" class='hidden lg:inline-flex '/>

                <x-header.mobile.hamburger class="lg:hidden" />

            </div>

      
    </div>
</div>