<section id='oferta' class='pb-12'>


    <div class='wrapper pt-6 md:pt-12'>
        <div class='max-w-screen-md mx-auto text-center space-y-1'>
            <span class='preheading'>{!!$home->offer_subheading!!}</span>
            <h2 class='heading'>{!!$home->offer_heading!!}</h2>
            <p class='text pt-4'>
                {!!$home->offer_text!!}
            </p>
        </div>

        <div class='grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 pt-6 md:pt-12'>

            @foreach ($offers as $offer)
            <a href="{{route('offers.show',$offer->slug)}}" 
                class='border border-primary-700 shadow-lg px-4 xl:px-8 py-8 2xl:aspect-square flex flex-col justify-center items-center text-center gap-4 m-4 hover:-translate-y-3 duration-300'>
                @if($offer->icon)
                <img src="{{asset('storage/' . $offer->icon)}}" alt="" class='size-16 text-secondary-400 pb-3 object-cover' />,
                @endif
                <h3 class='text-lg font-black text-black uppercase'>{!!$offer->title!!}</h3>
                <p>{!!$offer->short_desc!!}</p>
            </a>
            @endforeach



        </div>
    </div>
</section>