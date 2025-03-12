<nav>
    <ul class="flex flex-col justify-start items-start gap-8 pl-6">

        {{-- about --}}
        <x-header.mobile.nav-item href="{{ route('home') . '#' . __('global.anchor.about') }}">{{__('global.menu.about')}}</x-header.mobile.nav-item>
        {{-- about --}}

        {{-- rooms --}}
        <x-header.mobile.dropdown title="{{__('global.menu.offer')}}" href="{{ route('home') . '#' . __('global.anchor.offer') }}">
            @foreach ($offers as $offer)
            <x-header.mobile.dropdown-item route='offers.show' href="{{route('offers.show',$offer->slug)}}"
                title="{{$offer->title}}" />
            @endforeach
        </x-header.mobile.dropdown>

        {{-- realisations --}}
        <x-header.mobile.nav-item href="{{ route('realisations.index')  }}">{{__('global.menu.realisations')}}</x-header.mobile.nav-item>
        {{-- gallery --}}
        <x-header.mobile.nav-item href="{{ route('gallery') }}">{{__('global.menu.gallery')}}</x-header.mobile.nav-item>

        <x-header.mobile.nav-item href="{{ route('contact')  }}">{{__('global.menu.contact')}}</x-header.mobile.nav-item>


    </ul>
</nav>



