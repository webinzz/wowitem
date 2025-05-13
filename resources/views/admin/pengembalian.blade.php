<x-admincom.layout>

    @if (session('succes'))
        <x-admincom.alert class="bg-green-400">{{ session('succes') }}</x-admincom.alert>
    @endif


    @if (session('delete'))
        <x-admincom.alert class="bg-red-400">{{ session('delete') }}</x-admincom.alert>
    @endif


    @if (session('update'))
        <x-admincom.alert class="bg-yellow-400">{{ session("update") }}</x-admincom.alert>
    @endif


    {{-- main --}}
    <main class="grid grid-cols-6 gap-3 w-full">
        {{-- total itm --}}
        <x-admincom.count class="p-0 py-1 px-1  ">
            <x-slot:total>{{ count($pengembalians) }}</x-slot:total>
            <x-slot:name>total {{ $status }}</x-slot:name>
            <x-slot:icon>category</x-slot:icon>
          </x-admincom.count>



        {{-- search --}}
        <div class="bg-white col-span-3  rounded  shadow p-3">

        <form class="w-full" action="{{ url('admin/pengembalian/'. $status) }}" method="get">
            <input type="search" value="{{ request('search') }}" name="search"
                class="w-full rounded p-1 bg-background border-2 focus:border-blue-800 focus:outline-none"
                placeholder="Search Here">
        </form>
        </div>

        <div class="bg-white col-span-1 p-3  rounded  shadow flex items-center justify-center">

            <a href="{{ url('admin/laporanpengembalian') }}"
                class="w-full  border-2 hover:opacity-75 transition-all border-blue-400 bg-blue-400  text-white p-2 py-1 rounded">Create laporan</a>
        </div>





        @if($pengembalians->isEmpty())
        <div class="col-span-6 ">
            <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
            <p class="text-center text-xl text-text">no request {{ $status }} from user</p>
        </div>
        @else
        <x-admincom.table>

            <thead class="text-xs text-white  bg-blue-400 uppercase  ">
                <tr>
                    <th scope="col" class="px-3 py-5 ">
                        no
                    </th>
                    <th scope="col" class="px-3 py-5 ">
                        username
                    </th>
                    <th scope="col" class="px-5 py-3">
                        itemname
                    </th>
                    <th scope="col" class="px-5   py-3">
                        Tgl_pinjam
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Tgl_kembali
                    </th>
                    <th scope="col" class="px-5 py-3">
                        jumlah
                    </th>
                    <th scope="col" class="px-5 py-3">
                        prof_img
                    </th>
                    <th scope="col" class="px-5 py-3">
                        status
                    </th><th scope="col" class="pr-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>


            <tbody>

                <?php $no = 0; ?>
                @foreach ($pengembalians as $pengembalian)
                    <p id="totaldata" class="hidden">{{ count($pengembalians) }}</p>
                    <tr
                        class="bg-white border-b text-text dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-5 py-5">{{ $loop->iteration + $pengembalians->firstItem() - 1  }} </td>
                        <td class="px-5 py-5">{{ $pengembalian->user->name }} </td>
                        <td class="px-5">{{ $pengembalian->item->name }} </td>
                        <td class="px-5">{{ $pengembalian->peminjaman->tgl_pinjam }}</td>
                        <td class="px-5">{{ $pengembalian->created_at }}</td>
                        <td class="px-5">{{ $pengembalian->peminjaman->jumlah }}</td>
                        <td class="px-5">
                            <figure class="w-32  my-3 rounded bg-background  overflow-hidden  border">
                                <img class=" object-cover w-full h-full "
                                    src="{{ asset('storage/' . $pengembalian->bukti_img) }}"alt="">

                            </figure>
                        </td>
                        <td class="px-5">{{ $pengembalian->status }}</td>
                        <td>
                            <div class="flex pe-3 items-center gap-3">

                                {{-- tombol accept meh aya --}}
                                @if ($pengembalian->status == "pending")
                                {{-- button accpt --}}
                                <button data-modal-target="popup-modal{{ $pengembalian->id }}" data-modal-toggle="popup-modal{{ $pengembalian->id }}" class="block text-white bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                    accept
                                </button>

                                {{-- reject --}}
                                <form method="POST" action="{{ url('admin/pengembalian/pending/'. $pengembalian->id .'/reject') }}">
                                    @csrf
                                    @method('put')
                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        reject
                                    </button>


                                </form>

                                <div id="popup-modal{{ $pengembalian->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{ $pengembalian->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want accept this request?</h3>
                                                <form method="POST" action="{{ url('admin/pengembalian/pending/'. $pengembalian->id.'/accept') }}">
                                                    @csrf
                                                    @method('put')
                                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>

                                                    <a data-modal-hide="popup-modal"  class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</a>

                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                @else
                                    

                            {{-- delete --}}
                            <form action="{{ url('admin/pengembalian', $pengembalian->id) }}" method="POST" onsubmit="">
                                @method('delete')
                                @csrf

                                <button type="submit"
                                    class="bg-blue-600 cursor-pointer text-white p-2 px-4 rounded hover:bg-red-400 duration-300 transition-all">
                                    delete</button>
                            </form>
                                @endif
                                

                            </div>
                        </td>
                    </tr>



                    <?php $no += 1; ?>
                @endforeach

            </tbody>
        </x-admincom.table>
        @endif

        <div class="col-span-6 mb-40 text-text">
            {{ $pengembalians->links() }}
        </div>

    </main>
  <script >
      //edit form
let totaldata = document.getElementById("totaldata").textContent

let editform = [];
let editbutton = [];

for(let i= 0; i < totaldata; i++){

    editform[i] = document.querySelector(`#editform${i}`);
    editbutton[i] = document.querySelector(`#editbutton${i}`);

    editbutton[i].addEventListener("click", function(){
            editform[i].classList.toggle("hidden")
    })
};


//close massage button
document.addEventListener("DOMContentLoaded", function(){
    let massage = document.getElementById('massage');
     
})

function closemassage(){
    massage.classList.add("hidden");
}



function closebutton(){
    for (const editfor of editform) {
        editfor.classList.add("hidden");           
    }

}

  </script>
    
  <script src="{{ asset('js/crudpeminjaman.js') }}"></script>

</x-admincom.layout>
