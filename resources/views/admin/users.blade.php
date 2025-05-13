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
    <main class="w-full grid grid-cols-6 gap-3">
        {{-- total itm --}}
        <x-admincom.count class="p-0 py-1 px-1  ">
            <x-slot:total>{{ count($users) }}</x-slot:total>
            <x-slot:name>total user</x-slot:name>
            <x-slot:icon>person</x-slot:icon>
          </x-admincom.count>



        {{-- search --}}
        <div class="bg-white col-span-2  rounded  shadow p-3">

        <form class="w-full" action="{{ url('admin/users') }}" method="get">
            <input type="search" value="{{ request('search') }}" name="search"
                class="w-full rounded p-1 bg-background border-2 focus:border-blue-800 focus:outline-none"
                placeholder="Search Here">
        </form>
        </div>

        {{-- button --}}

        <div class="bg-white col-span-1  rounded text-center shadow p-4">
        
            <a href="{{ url('login') }}"
                class="w-full   border-2 hover:opacity-75 transition-all border-blue-400 bg-blue-400  text-white p-6 py-1  rounded">Add
                New</a>
        </div>

        <div class="bg-white col-span-1 p-3  rounded  shadow flex items-center justify-center">

            <a href="{{ url('admin/laporanuser') }}"
                class="w-full  border-2 hover:opacity-75 transition-all border-blue-400 bg-blue-400  text-white p-2 py-1 rounded">Create laporan</a>
        </div>




        <x-admincom.table>

            <thead class="text-xs text-white  bg-blue-400 uppercase  ">
                <tr>
                    <th scope="col" class="px-8 py-5 ">
                        No
                    </th>
                    <th scope="col" class="px-8 py-5 ">
                        id_user
                    </th>
                    <th scope="col" class="px-3 py-5 ">
                        Image
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-5   py-3">
                        no_telofon
                    </th>
                    <th scope="col" class="px-5 py-3">
                        email
                    </th>
                    <th scope="col" class="pr-5 py-3">
                        password
                    </th><th scope="col" class="pr-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>


            <tbody>

                <?php $no = 0; ?>
                @foreach ($users as $user)
                    <p id="totaldata" class="hidden">{{ count($users) }}</p>
                    <tr
                        class="bg-white border-b text-text dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-8">{{ $loop->iteration + $users->firstItem() - 1  }} </td>
                        <td class="px-8">{{ $user->id }} </td>
                        <td>
                            <figure class="w-16 h-16 rounded-full my-3 bg-background  overflow-hidden ml-3 border">
                                <img class=" object-contain w-full h-full "
                                    src="{{ asset("assets/profile.jpg") }}"alt="">

                            </figure>
                        </td>
                        <td class="px-5">{{ $user->name }} </td>
                        <td class="px-5">{{ $user->no_tlf }}</td>
                        <td class="px-5">{{ $user->email }}</td>
                        <td class="">........</td>
                        <td>
                            <div class="flex pe-3 items-center gap-3">
                                <button id="editbutton{{ $no }}"
                                    class=" bg-blue-500 cursor-pointer text-white p-2 px-4 rounded hover:bg-green-400 duration-300 transition-all">
                                    Edit</button>

                                {{-- delete --}}
                                <form action="{{ url('admin/users', $user->id) }}" method="POST" onsubmit="">
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
                        <div class="relative bg-white px-7 py-10 sm:px-10 h-auto mt-20  sm:w-1/2 mx-auto">
                            <span onclick="closebutton()"
                                class="absolute right-0 top-0 text-text hover:opacity-50 text-4xl cursor-pointer material-symbols-outlined">
                                close
                            </span>

                            <form action="{{ url('admin/users', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="flex gap-5 w-full">
                                    <div class="w-1/2 bg-background border-2 relative overflow-hidden">
                                        <img src="{{ asset('assets/profile.jpg') }}"
                                            class="h-full w-full object-cover" alt="Profile Picture" width="100">
                                    </div>

                                    <div class="w-1/2">
                                        <h1 class="text-2xl font-semibold text-blue-400 mb-3">Edit user</h1>
                                        <x-admincom.input value="{{ $user->name }}" placeholder="name" type="text" name="name"></x-admincom.input>
                                        <x-admincom.input value="{{ $user->no_tlf }}" placeholder="notelofon" type="number" name="notlf"></x-admincom.input>
                                        <x-admincom.input value="{{ $user->email }}" placeholder="email" type="text" name="email"></x-admincom.input>
                                        <input class="w-full border p-2 mt-2 rounded border-blue-400" placeholder="if you want change password" type="text" name="password"></input>
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
            {{ $users->links() }}
        </div>

    </main>
  <script>
      

//create form
let createform = document.getElementById('createform');
let createbutton = document.getElementById('createbutton');

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
    console.log(massage)
     
})

function closemassage(){
    massage.classList.add("hidden");
}



function closebutton(){
    for (const editfor of editform) {
        editfor.classList.add("hidden");           
    }

}

// input file img
let fileinput = document.getElementById('file-input');
let pname = document.getElementById('file-name');
  </script>
  <script src="{{ asset('js/cruduser.js') }}"></script>

</x-admincom.layout>
