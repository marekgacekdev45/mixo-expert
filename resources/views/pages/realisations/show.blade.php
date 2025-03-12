<x-layouts.app title="{{$realisation->getMetaTitle()}}" description="{{$realisation->getMetaDesc()}}"
    ogImage="{{$realisation->thumbnail}}">

    <x-hero img="{{$realisation->thumbnail}}" heading="{{$realisation->title}}" />


    <section class="max-w-screen-xl  mx-auto py-12 wrapper">
        <div class='wrapper pt-6 md:pt-12'>
            <div class='max-w-screen-md mx-auto text-center space-y-1 py-'>
              
                <h2 class='heading'>{!!$realisation->title!!}</h2>
                <div class='prose-title text pt-4'>
                    {!!$realisation->description!!}
                </div>
            </div>


            <div class="grid  sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 pt-12" >
                
                @foreach ($realisation->gallery as $img)
                <div class="w-full h-full object-cover image-item" >
                    <a href="{{asset('storage/' .  $img)}}" class="glightbox">

                        <img src="{{asset('storage/' .  $img)}}"
                            alt="{{$home->title}}" loading="lazy"
                            class="w-full object-cover aspect-square">
                    </a>

                </div>
                @endforeach
               
            </div>

        </div>

    </section>
</x-layouts.app>