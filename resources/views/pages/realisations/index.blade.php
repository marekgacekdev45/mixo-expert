<x-layouts.app title="{!!$content->meta_title!!}" description="{!!$content->meta_description!!}"
   >

    <x-hero img="{{$content->hero_image}}" heading="{{$content->hero_heading}}" />

    @if($content->subheading || $content->heading || $content->text)
    <section class='wrapper pt-6 md:pt-12'>
        <div class='max-w-screen-md mx-auto text-center space-y-1 py-'>
            <span class='preheading'>{!!$content->subheading!!}</span>
            <h2 class='heading'>{!!$content->heading!!}</h2>
            <p class='text pt-4'>
                {!!$content->text!!}
            </p>
        </div>
    </section>
    @endif

    <section class="max-w-screen-2xl  mx-auto py-12 wrapper">

    <div class='grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-12 lg:gap-6 2xl:gap-12 pt-6 md:pt-12'>

        @foreach ($realisations as $realisation)


        <a href='{{route('realisations.show',$realisation->slug)}}' class='bg-black border border-primary-700  shadow-lg   group'>
            <div class='overflow-hidden w-full '>
                <img src='{{asset('storage/' . $realisation->thumbnail)}}' alt='{{$realisation->title}}'
                    class=' aspect-square max-h-[400px] object-cover w-full group-hover:scale-105 duration-300'
                  />
            </div>

            <h3 class=' text-2xl font-black text-fontLight  p-10 text-center'>{{$realisation->title}}</h3>
        </a>
        @endforeach
    </div>
    <div class='wrapper !max-w-screen-2xl'>

</x-layouts.app>