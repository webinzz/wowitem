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
        <div class="w-1/2 border-2">.</div>
        <div class="w-1/2 ">
            <h1 class="text-2xl font-semibold text-blue-400 mb-3">Create New category</h1>
            <x-admincom.input placeholder="name" type="text" name="name"></x-admincom.input>
            <x-admincom.input placeholder="icon" type="text" name="icon"></x-admincom.input>


            <input class="w-full mt-5 py-3 rounded-lg text-white   hover:opacity-75 bg-blue-500" type="submit"
                value="Create">
        </div>
    </x-admincom.form>



    {{-- main --}}
    <main class="grid grid-cols-6 gap-3 w-full">
       {{-- total itm --}}
       <x-admincom.count class="p-0 py-1 px-1  ">
        <x-slot:total>{{ count($data) }}</x-slot:total>
        <x-slot:name>total item</x-slot:name>
        <x-slot:icon>category</x-slot:icon>
      </x-admincom.count>



    {{-- search --}}
    <div class="bg-white col-span-3  rounded  shadow p-3">

    <form class="w-full" action="{{ url('admin/category') }}" method="get">
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



        <x-admincom.table>

            <thead class="text-xs text-white  bg-blue-400 uppercase  ">
                <tr>
                    <th scope="col" class="pl-10     py-5 ">
                        NO
                    </th>
                    <th scope="col" class="text-center     py-5 ">
                        Id_category
                    </th>
                    <th scope="col" class="px-3 py-5 ">
                        Icon
                    </th>
                    <th scope="col" class="px-5">
                        Name
                    </th>
                    <th scope="col" class=" p-3 ">
                        action
                    </th>

                </tr>
            </thead>


            <tbody>

                <?php $no = 0; ?>
                @foreach ($data as $category)
                    <p id="totaldata" class="hidden">{{ count($data) }}</p>
                    <tr
                        class="bg-white border-b text-text dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-10">{{ $loop->iteration  }} </td>
                        <td class="text-center">{{ $category->id_category  }} </td>
                        <td class="pl-3">{{ $category->icon }} </td>
                        <td class="px-5">{{ $category->name }}</td>
                        <td>
                            <div class="flex p-3 items-center gap-3">
                                <button id="editbutton{{ $no }}"
                                    class=" bg-blue-500 cursor-pointer text-white p-2 px-4 rounded hover:bg-green-400 duration-300 transition-all">
                                    Edit</button>

                                {{-- delete --}}
                                <form action="{{ url('admin/category', $category->id_category) }}" method="POST" onsubmit="">
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
                        <div class="relative bg-white px-7 py-10 sm:px-10 h-auto mt-20  sm:w-1/3 mx-auto">
                            <span onclick="closebutton()"
                                class="absolute right-0 top-0 text-text hover:opacity-50 text-4xl cursor-pointer material-symbols-outlined">
                                close
                            </span>

                            <form action="{{ url('admin/category', $category->id_category) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="  w-full">

                                        <h1 class="text-2xl font-semibold text-blue-400 mb-3">Edit Items</h1>
                                        <x-admincom.input value="{{ $category->name }}" placeholder="name" type="text" name="name"></x-admincom.input>
                                        <x-admincom.input value="{{ $category->icon }}" placeholder="icon" type="text" name="icon"></x-admincom.input>
                                        <input
                                            class="w-full mt-5 py-3 rounded-lg text-white   hover:opacity-75 bg-blue-500"
                                            type="submit" value="Update">
                                </div>



                            </form>
                        </div>


                    </div>

                    <?php $no += 1; ?>
                @endforeach

            </tbody>
        </x-admincom.table>
        <div class="col-span-6 mb-40 text-text">
            {{ $data->links() }}
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
