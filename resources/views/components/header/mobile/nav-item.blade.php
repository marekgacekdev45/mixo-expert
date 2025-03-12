
@props(['href','class'=>''])

<li>

    <a href="{{$href}}"
        class="nav-item text-white nav__item link-hover group uppercase  {{$class}} mobileNavItem--js">
        {{$slot}}</a>
</li>