@props(["data"])

<a href="{{ url('category/'. $data->id_category) }}" style="cursor: pointer" {{ $attributes->merge(['class'=>'hover:bg-background  from-blue-400 to-blue-700 relative  col-span-2 m-0 py-1  flex px-5 text-text rounded w-full items-center gap-2 border-2 ']) }} >
    <span class="material-symbols-outlined text-2xl " >{{ $data->icon }}</span>
    <p class="text-sm ">{{ $data->name }}</p>
</a>