@if (session('pending'))
        <x-admincom.alert class="bg-yellow-400">{{ session('pending') }}</x-admincom.alert>
    @endif
<x-layout.sidelay>
    <main class="w-full grid grid-cols-6 gap-4 items-start pb-20">
        <div class="col-span-6 grid-cols-6 grid gap-3 items-start">
            <div class="md:col-span-2 col-span-6 relative p-5 bg-white rounded shadow-lg  -z-20">
                <figure class="absolute top-0 left-0 p-2 h-full w-full -z-10">
                    <div class="bg-blue-400 w-full h-full">.</div>
                </figure>
                <h1 class=" text-md sm:text-xl text-center text-white">Total Borowwing</h1>
                <h1 class=" text-4xl mt-4 text-center text-white">{{ count($borrowing) }}</h1>
            </div>
            <div class="md:col-span-2 col-span-6 relative p-5 bg-white rounded shadow-lg  -z-20">
                <figure class="absolute top-0 left-0 p-2 h-full w-full -z-10">
                    <div class="bg-blue-500 w-full h-full">.</div>
                </figure>
                <h1 class=" text-lg sm:text-xl text-center text-white">Total Pending</h1>
                <h1 class=" text-4xl mt-4 text-center text-white">{{ count($pending) }}</h1>
            </div>
            <div class="md:col-span-2 col-span-6 relative p-5 bg-white rounded shadow-lg  -z-20">
                <figure class="absolute top-0 left-0 p-2 h-full w-full -z-10">
                    <div class="bg-blue-600 w-full h-full">.</div>
                </figure>
                <h1 class=" text-lg sm:text-xl text-center text-white">Total Returned</h1>
                <h1 class=" text-4xl mt-4 text-center text-white">{{ count($returned) }}</h1>
            </div>
        </div>
        
        <div class="md:col-span-3 col-span-6 flex flex-col gap-4">
            <div class="  bg-white  flex gap-2 flex-col shadow-lg">

                <h1 class=" text-xl text-text  bg-white m-3 mb-0 rounded "> Your Borrowing :</h1>
                    @if($borrowing->isEmpty())
                    <div class="col-span-6 mt-0 pb-20 ">
                        <img src="{{ asset('assets/peminjaman.png') }}" alt="No Items" class="w-2/3  mx-auto">
                        <p class="text-center text-xl text-text">You doens't borrowing item</p>
                    </div>
                @else
                    @foreach ($borrowing as $borrow)
                        <x-pinjaman :data="$borrow"></x-pinjaman>    
                    @endforeach
                    <div class="p-3">
                        {{ $borrowing->links() }}
                    </div>

                @endif
            </div>
            
                    
                <div class="  bg-white flex gap-3  flex-col shadow-lg">
                    <h1 class=" text-xl text-text  bg-white m-3 mb-0 rounded ">On Proses borrow :</h1>
                    @if($pending->isEmpty())
                    <div class="col-span-6 mt-0 pb-20 ">
                        <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class="w-2/3  mx-auto">
                        <p class="text-center text-xl text-text">You doens't have pennding item</p>
                    </div>
                @else
                @foreach ($pending as $pend)
                <x-pinjaman :data="$pend"></x-pinjaman>    
            @endforeach
            <div class="p-3">
                {{ $pending->links() }}
            </div>

                @endif
                    
                </div>
    
        </div>
        

        
         <div class="md:col-span-3 col-span-6  flex gap-3 flex-col ">
            <div class="  bg-white  flex gap-2 flex-col shadow-lg">
                <h1 class=" text-xl text-text  bg-white m-3 mb-0 rounded "> Cleared :</h1>
                @if($returned->isEmpty())
                <div class="col-span-6 mt-0 pb-20 ">
                    <img src="{{ asset('assets/darurat.png') }}" alt="No Items" class="w-2/3  mx-auto">
                    <p class="text-center text-xl text-text">You doens't returened item</p>
                </div>
                @else
                    @foreach ($returned as $return)
                        <x-pengembalian :data="$return"></x-pengembalian>    
                    @endforeach
                    <div class="p-3">
                        {{ $returned->links() }}
                    </div>


                @endif
            </div>

           <div class="  bg-white  flex gap-2 flex-col shadow-lg">
                <h1 class=" text-xl text-text  bg-white m-3 mb-0 rounded ">on proses return :</h1>
                @if($proses->isEmpty())
                <div class="col-span-6 mt-0 pb-20 ">
                    <img src="{{ asset('assets/darurat.png') }}" alt="No Items" class="w-2/3  mx-auto">
                    <p class="text-center text-xl text-text">You doens't returened item</p>
                </div>
                @else
                    @foreach ($proses as $prose)
                        <x-pengembalian :data="$prose"></x-pengembalian>    
                    @endforeach
                    <div class="p-3">
                        {{ $proses->links() }}
                    </div>

                @endif
            </div>
           
           
            
        </div>
        
        


        
    </main>
    <script>
        function closemassage(){
            let massage = document.getElementById('massage');
            massage.classList.add("hidden");
        }
    </script>

</x-layout.sidelay>

