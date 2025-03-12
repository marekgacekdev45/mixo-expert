<x-layouts.app title="{!!$content->meta_title!!}" description="{!!$content->meta_description!!}" >

    <x-hero img="{{$content->hero_image}}" heading="{{$content->hero_heading}}" />  


        <section class="max-w-screen-2xl  mx-auto py-12 wrapper">


            <div class="flex justify-center items-center gap-4 flex-wrap mb-12">

                {{-- "All" Button --}}
                <button
                    class="   px-8 py-3 uppercase text-xs duration-300 bg-secondary-400   text-fontLight cursor-pointer   gallery-btn filter-btn"
                    data-title="">
                    {{__('global.button.all')}}
                </button>

                {{-- Buttons to filter by title --}}
                @foreach ($images as $image)

                <button
                    class="filter-btn   px-8 py-3 uppercase text-xs duration-300  bg-secondary-400   text-fontLight cursor-pointer"
                    data-title="{{ $image->category }}" aria-label="Filtruj przez: {{ $image->category }}">
                    {{ $image->category }}
                </button>
                @endforeach
            </div>


            <div class="grid  sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="image-gallery">
                @foreach ($images as $image)
                @foreach ($image->images as $img)
                <div class="w-full h-full object-cover image-item" data-title="{{ $image->category }}">
                    <a href="{{asset('storage/' .  $img)}}" class="glightbox">

                        <img src="{{asset('storage/' .  $img)}}"
                            alt="{{$home->title}} - {{ $image->category }}" loading="lazy"
                            class="w-full object-cover aspect-square">
                    </a>

                </div>
                @endforeach
                @endforeach
            </div>
          
        </section>

</x-layouts.app>
