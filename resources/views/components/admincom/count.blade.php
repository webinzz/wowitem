<a {{ $attributes->merge(["class"=>"col-span-2 bg-white rounded shadow relative flex p-4 gap-3 items-center hover:bg-slate-50"]) }}  >
    <div class="bg-blue-300 py-2 p-3 rounded text-white">
      <span class="material-symbols-outlined text-center text-2xl">{{ $icon }}</span>
    </div>
    <div class="text-text">
      <h1>{{ $total }}</h1>
      <h1 class="text-sm">{{ $name }}</h1>
    </div>
    <div class="absolute right-4 text-2xl text-text">></div>
  </a>