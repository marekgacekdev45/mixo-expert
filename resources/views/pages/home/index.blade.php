<x-layouts.app title="{{$home->meta_title}}" description="{{$home->meta_description}}">


   @include('pages.home.partials.hero')
   @include('pages.home.partials.offer')
   @include('pages.home.partials.about')
   @include('pages.home.partials.realisations')
   @include('pages.home.partials.cooperation')


    

</x-layouts.app>