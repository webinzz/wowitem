@props(['data'])

<div {{ $attributes->merge(["class"=>"bg-white shadow-lg mb-2 lg:col-span-1 col-span-2 p-4 flex gap-5 items-start"]) }}>

    <figure class="group max-w-44 min-w-44 sm:min-w-52 sm:max-w-52 h-52 bg-background border overflow-hidden" >
        <img src="{{ asset("storage/". $data->image) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">
    </figure>

    <div class="flex flex-col min-h-52 justify-between w-full">
        <div class="">
            <h2 class="text-xl font-bold text-blue-400 mb-1">{{ $data["name"] }}</h2>
            <p class="  text-text">{{ Str::limit($data['description'], 50) }}</p>
         </div>
         <div class="w-full">
            <div class="flex justify-between">
                <p class="  text-text font-medium">{{ $data["created_at"]->diffForHumans() }}</p>
                <p class="  text-text font-medium">Stock: {{ $data["stock"] }}</p>

            </div>
            <a href="item/{{ $data["id_item"] }}" class="w-full">
                <button class="hover hover:opacity-80  relative bg-gradient-to-r w-full from-blue-400 to-blue-600 text-white  p-2 mt-4 rounded">View</button>
            </a>
         </div>
     </div>

</div>