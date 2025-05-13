@props(["data"])
<div class="w-full flex items-center justify-between border-b-2  hover:bg-blue-50 m-0  p-3 bg-white  rounded">
    <div class="flex gap-3 items-center">
        <figure class="min-w-20 w-24 min-h-20 bg-background border" >
            <img src="{{ asset('storage/'. $data->bukti_img) }}" class="object-cover h-full w-full object-center" alt="">
    
        </figure>
        <div class="">
            <h2 class=" font-bold text-text mb-1">item: {{ $data->item->name }}</h2>
            <h2 class=" text-text mb-1">jumlah: {{ $data->peminjaman->jumlah }}</h2>
        </div>
    </div>
    
<div class="">
    <button data-modal-target="default-modal{{ $data->id }}" data-modal-toggle="default-modal{{ $data->id }}" class="hover:opacity-75 transition-all duration-500 p-2  text-white px-3 rounded bg-blue-400 ">Details</button>

</div>
    
    
</div>

<div id="default-modal{{ $data->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="w-screen h-screen bg-[#0000004b]">
     <div class="relative p-4 w-full max-w-2xl mx-auto mt-5 max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white pb-10 rounded-lg shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b  dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-text dark:text-white">
                    Details
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{ $data->id }}">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4  md:p-5 space-y-4">
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    item : {{ $data->item->name }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    quantity : {{ $data->peminjaman->jumlah }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    borrowing date : {{ $data->peminjaman->tgl_pinjam }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    returned date : {{ $data->created_at }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    image proof:
                 </p>
                 <div class="w-52">
                    <img class="object-contain" src="{{ asset('storage/'. $data->bukti_img) }}" alt="">
                 </div>
                
             </div>

         </div>
     </div>
     </div>
 </div>
 