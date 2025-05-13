<x-layout.sidelay>

    <main class="w-full grid  justify-center grid-cols-8 gap-3 pb-8">

 
        

            
            @if($data->isEmpty())
                <div class="col-span-9 ">
                    <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
                    <p class="text-center text-xl text-text">Items is undifined</p>
                </div>
            @else
                @foreach ($data as $barang)
                <div  class="bg-white shadow-lg relative  rounded-sm  sm:col-span-3 h-80 lg:col-span-2 col-span-9 w-full p-4 mb-2 items-start">
                    <figure class="min-w-52 mb-2 h-48  p-4 bg-background  overflow-hidden group">
                        <img src="{{ asset("storage/". $barang->item->image) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">
                    </figure>
                    
                    <div class="flex w-full justify-between items-center ">
                        <h2 class="text-md font-bold text-text">{{ $barang->item["name"] }}</h2>
                        <p class="  text-text">stock: {{ $barang->item["stock"] }}</p>
                    </div>
                    <div class="flex  gap-3 w-full">
                        <a href="{{ url('item/'. $barang->item->id_item) }}">
                            <button class=" hover:opacity-80  relative bg-gradient-to-r w-full from-blue-400 to-blue-600 px-6 text-white  p-2 mt-4 rounded">View</button>
                        </a>
                        <form action="{{ url('chart/'. $barang->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class=" hover:opacity-80  relative bg-gradient-to-r w-full bg-red-600  text-white  p-2 px-6 mt-4 rounded">delete</button>
                        </form>

                    </div>
                    
                </div>
                    
                @endforeach
            @endif

           





        


    </main>

</x-layout>
