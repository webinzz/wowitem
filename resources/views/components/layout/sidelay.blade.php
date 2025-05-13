<x-layout.layouthtml>
    <x-navbar></x-navbar>

    <x-sidebar></x-sidebar>

    <main class="w-full pt-[67px] sm:px-3 ">

        {{ $slot }}

    </main>

    <script>
        let sidebar = document.getElementById("aside")
        let hamburger = document.getElementById("hamburger")
        
        
        function muncul(){
            sidebar.classList.toggle("hidden");
            sidebar.classList.toggle("fixed");
            hamburger.classList.toggle("bg-slate-200");
        }
        
        let seacrh = document.getElementById("search")
        
        function munculsearch(){
            search.classList.toggle("hidden");
        }
    </script>

    //<script src="{{ asset('js/navbar.js') }}"></script>
    //<script src="{{ asset('js/items.js') }}"></script>
</x-layout.layouthtml>
