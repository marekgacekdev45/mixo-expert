<ul class='flex gap-6'>
    <x-header.desktop.nav-item  href="{{route('home') .'#o-nas'}}" title='O nas' />

    <x-header.desktop.nav-item  href="{{route('home') .'#oferta'}}" dropdown title="Oferta">
        <x-header.desktop.dropdown>

            @foreach ($offers as $room )
            <x-header.desktop.dropdown-item href="{{route('offers.show',$room->slug)}}" activeRoute="">{{$room->title}}
            </x-header.desktop.dropdown-item>
            @endforeach

        </x-header.desktop.dropdown>
    </x-header.desktop.nav-item>

    <x-header.desktop.nav-item  href="{{route('realisations.index')}}" title='Realizacje' />
    <x-header.desktop.nav-item  href="{{route('gallery') }}" title='Galeria' />

  

</ul>