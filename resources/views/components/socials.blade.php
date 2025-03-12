@props(['social','dark'=>false])


@if ($social->name == 'facebook')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="facebook">
    <x-iconpark-facebook-o class="group-hover:scale-105 duration-300 w-5 stroke-3 {{$dark ? 'text-secondary-600' : 'text-white'}}"    />
</a>
@endif

@if ($social->name == 'instagram')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="instagram">
    <x-iconpark-instagram-o class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}"   />
</a>
@endif

@if ($social->name == 'twitter')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="twitter">
    <x-iconpark-twitter-o class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}"    />
</a>
@endif

@if ($social->name == 'tiktok')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="tiktok">
    <x-iconpark-tiktok-o class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}"    />
</a>
@endif

@if ($social->name == 'youtube')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="youtube">
    <x-iconpark-youtube-o class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}"  />
</a>
@endif

@if ($social->name == 'tripadvisor')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="tripadvisor">
    <x-lineawesome-tripadvisor class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}" />
</a>
@endif

@if ($social->name == 'linkedin')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="linkedin">
    <x-iconpark-instagramone-o  class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}" />
</a>
@endif
@if ($social->name == 'telegram')
<a href="{{ $social->link }}" target="_blank" class="group" aria-label="linkedin">
    <x-iconpark-telegram  class="group-hover:scale-105 duration-300 w-5 {{$dark ? 'text-secondary-600' : 'text-white'}}" />
</a>
@endif