@props(['class' => '','light'=>false])

<ul id="languageSwitcher"
    class="ml-4 justify-center items-center gap-2 list-none text-sm flex  px-[6px] py-[4px] {{$class}}">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <li>
        <a rel="alternate" hreflang="{{ $localeCode }}"
        href="{{ LaravelLocalization::getLocalizedURL($localeCode, route('home'), [], true) }}"

            class="relative uppercase hover:text-accent-400 duration-500  text-xs {{$light ?'text-fontLight':'text-fontDark'}} tracking-wider   {{ App::getLocale() === $localeCode ? ' before:absolute before:bottom-0 before:left-0 before:w-[70%] before:h-[1px] before:bg-primary-200 active font-semibold ' : '' }}">
            {{ strtoupper($localeCode) }}
        </a>
    </li>
    @endforeach
</ul>