<x-layouts.app title="{{$content->meta_title}}" description="{{$content->meta_description}}"
   >

    <x-hero img="{{$content->hero_image}}" heading="{{$content->hero_heading}}" />


    <section class="max-w-screen-xl  mx-auto py-12 wrapper">
        <div class=" prose-content ">

            {!!$content->content!!}
        </div>
    </section>


</x-layouts.app>