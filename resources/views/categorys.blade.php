<x-layout.sidelay>

    <main class="w-full grid  justify-center grid-cols-4 gap-3 pb-8">

        <div class="relative col-span-4 shadow-lg  h-80 sm:p-16 p-5 overflow-hidden sm:text-start text-center pt-20">
            <div class="absolute w-full h-full bg-white -z-10 p-2 top-0 left-0">
                <img class="  w-full h-full  " src="{{ asset('assets/herobarang.png') }}" alt=""> 
            </div>
            <h1 class="text-slate-50 text-2xl mb-3 font-bold lg:w-1/2">Browse any categories to find the items you are looking for and need </h1>
            <p class=" text-slate-50 text-lg sm:w-2/3  "> there are electronics, sports equipment and others</p>
       
            <img class="absolute xl:block hidden h-full translate-y-10 right-10 bottom-3" src="{{ asset('vector/herocategory.png') }}" alt="">
       
        </div>

        <div class=" sm:hidden col-span-4 overflow-x-scroll relative h-16 p-2">
            <div class="flex gap-3 absolute">
                @foreach ($categorys as $category)
                <a href="{{ url('category/'. $category->id_category) }}" class="{{ request()->is('category/'.$category->id_category) ? 'bg-blue-400 text-white' : '' }} border border-text p-2 px-4 text-text">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
        </div>
        
        

        <div class="xl:col-span-3 col-span-4 grid grid-cols-6 mb-2 sm:p-0 px-2  gap-2">
            
            @if($items->isEmpty())
                <div class="col-span-6 ">
                    <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
                    <p class="text-center text-xl text-text">Items is undifined</p>
                </div>
            @else
                @foreach ($items as $barang)
                    <x-barang :data="$barang"></x-barang>

                    
                @endforeach
            @endif



        </div>



        <div class="xl:col-span-1 relative w-full h-full">
            <div class=" w-full right-0 col-span-3 sticky top-16   h-[85vh] rounded shadow-lg py-5 pb-5 px-6 hidden xl:flex flex-col gap-3 bg-white">
                <div class="flex justify-between items-center">
                    <h1 class="text-text text-lg mb-1">choose what you need : </h1>
                </div>

                <a href="{{ url('categorys/') }}" style="cursor: pointer" class="{{ request()->is('categorys') ? 'bg-gradient-to-r text-white' : '' }} hover:bg-background from-blue-400 to-blue-700 relative  col-span-2 m-0 py-1  flex px-5  text-text rounded w-full items-center gap-2 border-2 ">
                    <span class="material-symbols-outlined text-2xl " >category_search</span>
                    <p class="text-sm ">All</p>
                </a>

                @foreach ($categorys as $category)
                <x-category :data="$category"  class="{{ request()->is('category/'.$category->id_category) ? 'bg-gradient-to-r text-white' : '' }}">
                    </x-category>
                @endforeach
               
                {{-- <x-category>
                    <x-slot:name>electronic</x-slot:name>
                    <x-slot:icon>laptop_mac</x-slot:icon>
                </x-category>
                <x-category>
                    <x-slot:name>sports</x-slot:name>
                    <x-slot:icon>sports_soccer</x-slot:icon>
                </x-category>
                <x-category>
                    <x-slot:name>kitchin</x-slot:name>
                    <x-slot:icon>skillet</x-slot:icon>
                </x-category>
                <x-category>
                    <x-slot:name>Event</x-slot:name>
                    <x-slot:icon>celebration</x-slot:icon>
                </x-category>
                <x-category>
                    <x-slot:name></x-slot:name>
                    <x-slot:icon>genres</x-slot:icon>
                </x-category> --}}

            </div>
        </div>


    </main>

</x-layout>
