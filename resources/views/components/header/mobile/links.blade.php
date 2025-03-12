<nav>
    <ul class="flex flex-col justify-start items-start gap-8 pl-6">

        {{-- about --}}
        <x-header.mobile.nav-item href="{{ route('home') .'#o-nas' }}">O nas</x-header.mobile.nav-item>
        {{-- about --}}

        {{-- rooms --}}
        <x-header.mobile.dropdown title="Oferta" href="{{ route('home') .'#oferta' }}">
            @foreach ($offers as $room)
            <x-header.mobile.dropdown-item route='offers.show' href="{{route('offers.show',$room->slug)}}"
                title="{{$room->title}}" />
            @endforeach
        </x-header.mobile.dropdown>

        {{-- realisations --}}
        <x-header.mobile.nav-item href="{{ route('gallery') }}">Galeria</x-header.mobile.nav-item>
        {{-- gallery --}}
        <x-header.mobile.nav-item href="{{ route('realisations.index')  }}">Realizacje</x-header.mobile.nav-item>

        <x-header.mobile.nav-item href="{{ route('contact')  }}">Kontakt</x-header.mobile.nav-item>


    </ul>
</nav>