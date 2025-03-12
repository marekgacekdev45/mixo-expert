@props(['route','title','href'])

<li class="mt-3 ml-8"><a href="{{$href}}"
        class="{{ request()->routeIs($route) ? 'nav__item--active' : 'text-fontLight' }}   duration-500 link-hover">{{$title}}</a>
</li>