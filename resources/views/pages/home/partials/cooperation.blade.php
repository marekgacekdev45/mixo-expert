<section id='wspolpraca' class='pt-5 sm:pt-10 pb-20 '>
    <div class='wrapper !max-w-screen-xl'>
        <div class='max-w-screen-lg mx-auto text-center space-y-1'>
            <span class='preheading'>{!!$home->cooperation_subheading!!}</span>
            <h2 class='heading'>{!!$home->cooperation_heading!!} </h2>
            <div class='text pt-4'>
                {!!$home->cooperation_text!!}
        </div>

        <div class='flex justify-center mt-12'>
            <x-link-btn href="{{route('contact')}}" label="kontakt"/>
        </div>
    </div>
</section>