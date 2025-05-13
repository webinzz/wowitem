<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<div id="aside" class="min-w-64 md:flex   hidden z-10">
    <aside class="h-screen bg-blue-400 border-r-2 min-w-64 fixed z-50 top-0 shadow-lg left-0 gap-6  py-3  flex flex-col  ">
        <div class="rounded  flex p-4 gap-3 items-center " >
            <div class="bg-white py-2 p-3 rounded">
                <img src="{{ asset('assets/logo.png') }}" class="h-10" alt="Logo" />

            </div>
            <div class="text-white  ">
              <h1 class="font-bold">WOWITEM</h1>
              <p class="text-sm">admin</p>
            </div>
          </div>
        <ul class=" ">
            <x-admincom.sidelink href="/admin" class=" {{ request()->is('admin') ? 'bg-blue-300  border-white' : '' }}">home<x-slot:name>dashboard</x-slot:name> </x-admincom.sidelink>
            <x-admincom.sidelink href="/admin/items" class=" {{ request()->is('admin/items') ? 'bg-blue-300  border-white' : '' }}">shopping_bag<x-slot:name>Items</x-slot:name> </x-admincom.sidelink>
            <x-admincom.sidelink href="{{ url('admin/users') }}" class="my-0 {{ request()->is('admin/users') ? 'bg-blue-300  border-white' : '' }}">person_search<x-slot:name>User</x-slot:name> </x-admincom.sidelink>
            <x-admincom.sidelink href="{{ url('admin/category') }}" class="my-0 {{ request()->is('admin/category') ? 'bg-blue-300  border-white' : '' }}">category_search<x-slot:name>category</x-slot:name> </x-admincom.sidelink>
            <button type="button" class="px-7 hover:text-text flex items-center w-full p-3 text-base text-white transition duration-75 group hover:bg-gray-100 " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <span class="material-symbols-outlined">approval_delegation</span>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Borrow</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                <li>
                   <a href="{{ url('admin/peminjaman/pending') }}" class="flex items-center w-full p-2 text-white transition duration-75 pl-11  hover:bg-gray-100 hover:text-text">pending</a>
                </li>
                <li>
                   <a href="{{ url('admin/peminjaman/borrowing') }}" class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-gray-100 hover:text-text">borrowed</a>
                </li>
                
          </ul>
            <button type="button" class="px-7 hover:text-text flex items-center w-full p-3 text-base text-white transition duration-75 group hover:bg-gray-100 " aria-controls="dropdown" data-collapse-toggle="dropdown">
                <span class="material-symbols-outlined">check_circle</span>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">returned</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            
           

          <ul id="dropdown" class="hidden py-2 space-y-2">
                <li>
                   <a href="{{ url('admin/pengembalian/pending') }}" class="flex items-center w-full p-2 text-white transition duration-75 pl-11  hover:bg-gray-100 hover:text-text">pending</a>
                </li>
                
                <li>
                   <a href="{{ url('admin/pengembalian/returned') }}" class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-gray-100 hover:text-text">returned</a>
                </li>
          </ul>

        </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    <x-admincom.sidelink>logout<x-slot:name>Logout</x-slot:name></x-admincom.sidelink>
                </button>
            </form>
        
        
        
    
    </aside>
</div>


