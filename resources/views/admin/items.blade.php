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


    {{-- craete form --}}

    <x-admincom.form>
        <div class="w-1/2 bg-background border relative overflow-hidden p-3 flex flex-col">
                <input required type="file" id="file-input" name="image" class="hidden" />
                <label for="file-input"
                    class=" cursor-pointer bg-blue-500 text-white w-40 py-2 px-4 rounded hover:bg-blue-400 transition-all">Upload
                    File</label>
                <span id="file-name" class="text-center">No file chosen</span>
        </div>

        <div class="w-1/2">
            <h1 class="text-2xl font-semibold text-blue-400 mb-3">Create New Items</h1>
            <x-admincom.input placeholder="name" type="text" name="name"></x-admincom.input>
            <select name="category" placeholder="" class="w-full border-2 p-2 rounded focus:border-blue-800">
                @foreach ($categorys as $category)
                    <option value='{{ $category->id_category }}'>{{ $category->name }}</option>
                @endforeach
                
            </select>
            <x-admincom.input placeholder="description" type="text" name="description"></x-admincom.input>
            <x-admincom.input placeholder="stock" type="number" name="stock"></x-admincom.input>

            <input class="w-full mt-5 py-3 rounded-lg text-white   hover:opacity-75 bg-blue-500" type="submit"
                value="Create">
        </div>
    </x-admincom.form>



    {{-- main --}}
    <main class="w-full grid grid-cols-6 gap-3 items-end ">
        {{-- total itm --}}
        <x-admincom.count class="p-0 py-1 px-1  ">
            <x-slot:total>{{ count($items) }}</x-slot:total>
            <x-slot:name>total item</x-slot:name>
            <x-slot:icon>category</x-slot:icon>
          </x-admincom.count>



        {{-- search --}}
        <div class="bg-white col-span-2  rounded  shadow p-3">

        <form class="w-full" action="{{ url('admin/items') }}" method="get">
            <input type="search" value="{{ request('search') }}" name="search"
                class="w-full rounded p-1 bg-background border-2 focus:border-blue-800 focus:outline-none"
                placeholder="Search Here">
        </form>
        </div>

        {{-- button --}}

        <div class="bg-white col-span-1  rounded  shadow p-3">
        
            <button id="createbutton"
                class="w-full  border-2 hover:opacity-75 transition-all border-blue-400 bg-blue-400  text-white p-2 py-1 rounded">Add
                New</button>
        </div>

        <div class="bg-white col-span-1 p-3  rounded  shadow flex items-center justify-center">

            <a href="{{ url('admin/laporanitem') }}"
                class="w-full  border-2 hover:opacity-75 transition-all border-blue-400 bg-blue-400  text-white p-2 py-1 rounded">Create laporan</a>
        </div>



        <x-admincom.table>

            <thead class="text-xs text-white  bg-blue-400 uppercase  ">
                <tr>
                    <th scope="col" class="px-8 py-5 ">
                        No
                    </th>
                    <th scope="col" class="px-8 py-5 ">
                        Id_item
                    </th>
                    <th scope="col" class="px-5 py-5 ">
                        Image
                    </th>
                    <th scope="col" class="pr-10 pl-5 py-3">
                        Name
                    </th>
                    <th scope="col" class="sm:pr-6 pl-5  pr-60   py-3">
                        Description
                    </th>
                    <th scope="col" class="sm:pr-6 pl-5  pr-60   py-3">
                        category
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Stock
                    </th>
                    <th scope="col" class="pr-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>


            <tbody>

                <?php $no = 0; ?>
                @foreach ($items as $item)

                    <p id="totaldata" class="hidden">{{ count($items) }}</p>
                    <tr
                        class="bg-white border-b text-text dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-8">{{$loop->iteration + $items->firstItem() - 1 }} </td>
                        <td class=" text-center">{{ $item->id_item }} </td>

                        <td class="pr-5">
                            <figure class="w-32 h-24 my-3 rounded bg-background  overflow-hidden ml-3 border">
                                <img class=" object-contain w-full h-full "
                                    src="{{ asset('storage/' . $item->image) }}"alt="">

                            </figure>
                        </td>
                        <td class="pl-5">{{ $item->name }} </td>
                        <td class="pl-5">{{ Str::limit($item->description, 50, '...') }}</td>
                        <td class="text-center">{{ $item->id_category }}</td>
                        <td class="text-center">{{ $item->stock }}</td>
                        <td>
                            <div class="flex pe-3 items-center gap-3">
                                <button id="editbutton{{ $no }}"
                                    class=" bg-blue-500 cursor-pointer text-white p-2 px-4 rounded hover:bg-green-400 duration-300 transition-all">
                                    Edit</button>

                                {{-- delete --}}
                                <form action="{{ url('admin/items', $item->id_item) }}" method="POST" onsubmit="">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="bg-blue-600 cursor-pointer text-white p-2 px-4 rounded hover:bg-red-400 duration-300 transition-all">
                                        delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    {{-- edit form --}}
                    <div id="editform{{ $no }}"
                        class="fixed w-full h-full bg-[rgba(0,0,0,.5)] hidden top-0 left-0 z-50">
                        <div class="relative bg-white px-7 py-12 sm:px-10 h-auto mt-20  sm:w-1/2 mx-auto">
                            <span onclick="closebutton()"
                                class="absolute right-0 top-0 text-text hover:opacity-50 text-4xl cursor-pointer material-symbols-outlined">
                                close
                            </span>

                            <form action="{{ url('admin/items', $item->id_item) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="flex gap-5 w-full">
                                    <div class="w-1/2 bg-background border-2 relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            class="h-full w-full object-contain" alt="Profile Picture" width="100">
                                    </div>

                                    <div class="w-1/2">
                                        <h1 class="text-2xl font-semibold text-blue-400 mb-3">Edit Items</h1>
                                        <x-admincom.input value="{{ $item->name }}" placeholder="name" type="text" name="name"></x-admincom.input>
                                        <select name="category" placeholder="" class="w-full border-2 p-2 rounded focus:border-blue-800">
                                            <option value='{{ $item->id_category }}'>{{ $item->category->name }}</option>
                                            @foreach ($categorys as $category)
                                                <option value='{{ $category->id_category }}'>{{ $category->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                        <x-admincom.input value="{{ $item->description }}" placeholder="description" type="text" name="description"></x-admincom.input>
                                        <x-admincom.input value="{{ $item->stock }}" placeholder="stock" type="number" name="stock"></x-admincom.input>
                                        <input
                                            class="w-full mt-5 py-3 rounded-lg text-white   hover:opacity-75 bg-blue-500"
                                            type="submit" value="Update">
                                    </div>
                                </div>



                            </form>
                        </div>


                    </div>

                    <?php $no += 1; ?>
                @endforeach

            </tbody>

            
        </x-admincom.table>

        <div class="col-span-6 mb-40 text-text">
            {{ $items->links() }}
        </div>


    </main>
  <script >
      

//create form
let createform = document.getElementById('createform');
let createbutton = document.getElementById('createbutton');

createbutton.addEventListener("click", function(){
    createform.classList.toggle("hidden")
})

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
    let massage = document.getElementById('massage');
    massage.classList.add("hidden");
}



function closebutton(){
    createform.classList.add("hidden");
    for (const editfor of editform) {
        editfor.classList.add("hidden");           
    }

}

// input file img
let fileinput = document.getElementById('file-input');
let pname = document.getElementById('file-name');

fileinput.addEventListener('change', function(event) {
    let fileName = event.target.files[0].name;
    pname.textContent = fileName;
});
  </script>
  <script src="{{ asset('js/cruditem.js') }}"></script>

</x-admincom.layout>
