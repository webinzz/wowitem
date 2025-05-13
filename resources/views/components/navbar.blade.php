<nav class="w-full shadow px-5 bg-white p-2 border-b-2 left-0  fixed top-0  z-50">
    <div class="sm:raltive w-full flex gap-2 items-center justify-between">
        <div class="logo  flex gap-2 items-center">
            <img src="{{ asset('assets/logo.png') }}" class="h-8" alt="Logo" />
            <span class="self-center text-2xl title font-semibold whitespace-nowrap text-blue-300">WOW<span
                    class="title text-blue-400">ITEMS</span> </span>
        </div>

        <div id="search" class="hidden md:block absolute top-20 sm:top-3 w-1/2 left-1/2 -translate-x-1/2 ">
            <form action="{{ url('item/search') }}" method="GET">
                <input type="text" name="search" value="{{ request('search') }}"
                class="w-full  px-3 text-text border rounded p-1 focus:outline-none focus:border-blue-400"
                placeholder="Temukan barang ">
            </form>
        </div>
        
       

        <div class="link flex items-center gap-2 justify-end" style="cursor: pointer">
            <span  onclick="munculsearch()"
                class="material-symbols-outlined p-2 inline md:hidden rounded-full duration-500 transition hover:bg-white  hover:shadow-lg  text-text">search</span>
           


            @auth
                <a href="{{ url('chart') }}"
                    class="material-symbols-outlined p-2 rounded-full duration-500 transition hover:bg-white  hover:shadow-lg  text-text">shopping_cart</a>
                <a href="{{ url('pinjaman') }}"
                    class="material-symbols-outlined p-2 rounded-full hidden md:inline duration-500 transition  hover:bg-white hover:shadow-lg  text-text">schedule</a>
                <a href="{{ url('profile') }}"
                    class=" hidden md:flex  p-1 my-1 px-4 text-text rounded-lg h-8 gap-4 border hover:shadow-md duration-1000 transition  bg-white">
                    <img class=" rounded-full " src="{{ asset('assets/profile.jpg') }} " alt="">
                    {{ auth()->user()->name }}
                </a>
            @endauth
            <span onclick="muncul()" id="hamburger"
            class="material-symbols-outlined md:hidden text-text p-2 rounded-full hover:shadow-lg text-3xl"
            style="cursor: pointer">menu</span>
            @guest
                <a href="{{ url('login') }}"
                    class=" hidden m-1 md:flex  p-1 px-5 border-2 text-text rounded h-8 gap-2 bg-white hover:shadow-md duration-1000 transition">
                    Sign in
                </a>
            @endguest

        </div>
    </div>
</nav>
