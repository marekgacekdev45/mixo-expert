<ul class='flex gap-6'>
    <x-header.desktop.nav-item  href="{{ route('home') . '#' . __('global.anchor.about') }}" title="{{__('global.menu.about')}}" />

    <x-header.desktop.nav-item  href="{{ route('home') . '#' . __('global.anchor.offer') }}" dropdown title="{{__('global.menu.offer')}}">
        <x-header.desktop.dropdown>

            @foreach ($offers as $room )
            <x-header.desktop.dropdown-item href="{{route('offers.show',$room->slug)}}" activeRoute="">{{$room->title}}
            </x-header.desktop.dropdown-item>
            @endforeach

        </x-header.desktop.dropdown>
    </x-header.desktop.nav-item>

    <x-header.desktop.nav-item  href="{{route('realisations.index')}}" title="{{__('global.menu.realisations')}}" />
    <x-header.desktop.nav-item  href="{{route('gallery') }}" title="{{__('global.menu.gallery')}}" />

  

</ul>


