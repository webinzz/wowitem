<x-layout.sidelay>
    <main class="w-full grid grid-cols-2 gap-3  items-start">

        
        @if($items->isEmpty())
        <div class="col-span-2 pb-20">
            <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
            <p class="text-center text-xl text-text">Items is undifined</p>
        </div>
        @else
            @foreach ($items as $barang)
            <x-new :data="$barang" class=""></x-new>
                
            @endforeach
        @endif
        

    </main>
</x-layout.sidelay>