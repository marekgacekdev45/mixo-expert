<x-layouts.app title="{{$offer->getMetaTitle()}}" description="{{$offer->getMetaDesc()}}"
    ogImage="{{$offer->thumbnail}}">

    <x-hero img="{{$offer->thumbnail}}" heading="{{$offer->title}}" />


    <section class="max-w-screen-xl  mx-auto py-12 wrapper">
        <div class=" prose-content ">

            {!!$offer->content!!}
        </div>
    </section>


</x-layouts.app>