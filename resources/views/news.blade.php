<x-layout.sidelay>
    <main class="w-full min-h-[85vh] grid grid-cols-2 gap-3  items-start">

        <div class="relative col-span-2 shadow-lg  h-80 sm:p-16 p-5 overflow-hidden sm:text-start text-center pt-20">
            <div class="absolute w-full h-full bg-white -z-10 p-2 top-0 left-0">
                <img class="  w-full h-full  " src="assets/heronew.png" alt=""> 
            </div>
            <h1 class="text-slate-50 text-2xl mb-3 font-bold sm:w-1/2">Hot and new, Stay up to date with newly added products </h1>
            <p class=" text-slate-50 text-lg sm:w-2/3  "> that might be exactly what you’re looking for</p>
            
            <img class="absolute xl:block hidden h-full translate-y-10 right-10 bottom-3" src="{{ asset('vector/herofix.png') }}" alt="">

        </div>
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
    
</x-layout>

