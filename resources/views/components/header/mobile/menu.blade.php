<div class="fixed top-0 bottom-0 right-0 left-0 sm:left-[50%] lg:left-[60%] 2xl:left-[75%]  flex flex-col justify-between px-7 py-5  bg-black  opacity-0 duration-300 ease-out z-50 translate-x-[100%] overflow-y-auto menu--js"
    style="z-index: 10000000000">

    <div class="flex flex-col gap-16 pb-16">

        {{-- CLOSE BTN --}}
        <div class="flex justify-end">
            <button class="border border-white p-2 rounded-full cursor-pointer group closeMenuBtn--js"
                aria-label="Zamknij menu">
                <img src="{{asset('assets/icons/close.svg')}}" alt=""
                    class="size-10 group-hover:rotate-90 duration-300">
            </button>
        </div>

        {{-- LINKS --}}
        <x-header.mobile.links />

    </div>
    {{-- LANGUAGE SWITCHER --}}
    <div class="flex flex-col justify-end ">
        <x-header.language-switcher light class="self-end" />
        <hr class="my-5 border-primary-600">

        <div class="flex justify-end  gap-2 pr-2">

            @if ($socials->isNotEmpty())
            <div class="flex justify-center sm:justify-start items-center gap-3">
                @foreach ($socials as $social)
                <x-socials :social="$social" />
                @endforeach
            </div>
            @endif
            
            <div class="border-l pl-2 flex justify-center items-center gap-2 pt-0.5">
                <a href="tel:+48{{$home->phone}}" class="group" aria-label="telefon">
                    <x-lucide-phone class="w-5 stroke-1 text-white group-hover:scale-105 duration-300" />
                </a>
                <a href="mailto:{{$home->email}}" class="group" aria-label="telefon">
                    <x-lucide-mail class="w-5 stroke-1 text-white group-hover:scale-105 duration-300" />
                </a>

            </div>
        </div>
    </div>

</div>