@props(['massage'])
<div id="massage"
    {{ $attributes->merge(["class"=>"fixed p-4 mb-4 text-sm text-white  z-[100] w-1/3 right-0 bottom-0 rounded-lg flex justify-between"]) }}
    role="alert">
    <span class="font-medium">{{ $slot }}</span>
    <span onclick="closemassage()" class="material-symbols-outlined cursor-pointer hover:opacity-70">
        close
    </span>

</div>

