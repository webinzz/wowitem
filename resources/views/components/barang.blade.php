@props(['data'])

<div {{ $attributes }} class="bg-white shadow-lg  rounded-sm  sm:col-span-3 h-80 lg:col-span-2 col-span-6 w-full p-4 mb-2 items-start">
    <figure class="min-w-52 mb-2 h-48  p-4 bg-background  overflow-hidden group">
        <img src="{{ asset("storage/". $data->image) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">
    </figure>
    
    <div class="flex w-full justify-between items-center ">
        <h2 class="text-md font-bold text-text">{{ $data["name"] }}</h2>
        <p class="  text-text">stock: {{ $data["stock"] }}</p>
    </div>
    <a href="{{ url('item/'. $data->id_item) }}">
        <button class="hover hover:opacity-80  relative bg-gradient-to-r w-full from-blue-400 to-blue-600 text-white  p-2 mt-4 rounded">View</button>
    </a>
</div>