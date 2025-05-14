@props(['data'])
@php
$images = [
    "laptop.png",
    "mouse.png",
    "laptop-acer.png",
    "camera.png",
    "voly-ball.png",
    "basket-ball.png",
    "skipping.png",
    "guitar.png",
    "racket.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
    "corner.png",
];
@endphp
<div  {{ $attributes->merge(['class'=> 'bg-white group shadow-lg p-2 min-w-64 w-64 ']) }}>
    <figure class=" overflow-hidden bg-background h-full border relative ">
        <img src="{{ asset('gambar/'. $images[$data->id_item - 1]) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">

        <div class="w-full h-full  z-50 transition-all duration-500 translate-y-96 group-hover:translate-y-0  absolute  flex justify-center items-center top-0" style="background-color: rgba(255, 255, 255, 0.527)">
            <a href="item/{{ $data["id_item"] }}" class=" text-white bg-blue-500 px-5 py-3 rounded-lg blur-0">View</a>
        </div>
        
    </figure>
</div>

