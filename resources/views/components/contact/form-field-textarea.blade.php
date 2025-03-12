@props(['name','label'])

<div class="relative z-0 w-full mb-5 group">


    <textarea wire:model.live.lazy="{{$name}}" name="{{$name}}" id="{{$name}}"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b border-gray-400 appearance-none  focus:outline-none focus:ring-0 focus:border-primary-200 peer min-h-[200px] max-h-[200px]"
        placeholder=" " required></textarea>
        <label for="{{$name}}"
        class=" tracking-widest absolute  text-fontDark  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-secondary-400 peer-focus:dark:text-secondary-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{$label}}</label>
    @error('{{$name}}')
    <p class="text-red-500 font-extralight text-xs mt-2">{{ $message }}</p>
    @enderror
</div>