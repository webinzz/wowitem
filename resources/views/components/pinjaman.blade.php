@props(["data"])
<div class="w-full flex items-center justify-between border-b-2  hover:bg-blue-50 m-0  p-3 bg-white  rounded">
    <div class="flex gap-3 items-center">
        <figure class="min-w-20 w-24 h-20 bg-background border" >
            <img src="{{ asset('storage/'. $data->item->image) }}" class="object-contain h-full w-full object-center" alt="">
    
        </figure>
        <div class="">
            <h2 class=" font-bold text-text mb-1">{{ $data->item->name }}</h2>
            <h2 class=" text-text mb-1">jumlah: {{ $data->jumlah }}</h2>
        </div>
    </div>
    
<div class="">
    <button data-modal-target="default-modal{{ $data->id_peminjaman }}" data-modal-toggle="default-modal{{ $data->id_peminjaman }}" class="hover:opacity-75 transition-all duration-500 p-2  text-white px-3 rounded bg-blue-400 ">Details</button>
    @if ($data->status == "borrowing")
    <button data-modal-target="edit{{ $data->id_peminjaman }}" data-modal-toggle="edit{{ $data->id_peminjaman }}" class="hover:opacity-75 transition-all duration-500 p-2  text-white px-3 rounded bg-green-400 ">isdone</button>
        
    @endif
</div>
    
    
</div>

<div id="default-modal{{ $data->id_peminjaman }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="w-screen h-screen bg-[#0000004b]">
     <div class="relative p-4 w-full max-w-2xl mx-auto mt-20 max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white pb-10 rounded-lg shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b  dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-text dark:text-white">
                    Details
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{ $data->id_peminjaman }}">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4  md:p-5 space-y-4">
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    name : {{ $data->item->name }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    quantity : {{ $data->jumlah }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    borrowing date : {{ $data->tgl_pinjam }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    returned date : {{ $data->tgl_kembali }}
                 </p><p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    returned time : {{ $data->jam_kembali }}
                 </p>
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ $data->item->description }}
                 </p>
             </div>

         </div>
     </div>
     </div>
 </div>
 
 <div id="edit{{ $data->id_peminjaman }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="w-screen h-screen bg-[#0000004b]">
     <div class="relative p-4 w-full max-w-2xl mx-auto mt-5 max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white pb-10 rounded-lg shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b  dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-text dark:text-white">
                    are you sure?
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit{{ $data->id_peminjaman }}">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4  md:p-5 space-y-4">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        name : {{ $data->item->name }}
                     </p>
                     <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        quantity : {{ $data->jumlah }}
                     </p>
                     <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        borrowing date : {{ $data->tgl_pinjam }}
                     </p>
                     <p class="text-base mb-2 leading-relaxed text-gray-500 dark:text-gray-400">
                        Please enter an image for proof : 
                     </p>
                     <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file{{ $data->id_peminjaman }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 dark:border-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file{{ $data->id_peminjaman }}" required name="img" type="file" class="hidden" />
                        </label>
                    </div> 
                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id_item" value="{{ $data->item->id_item }}">
                    <input type="hidden" name="id_peminjaman" value="{{ $data->id_peminjaman }}">
                    <button type="submit" class="mt-5 p-3 w-full bg-blue-500">submit</button>
                    </form> 
               
             </div>

         </div>
     </div>
     </div>
 </div>