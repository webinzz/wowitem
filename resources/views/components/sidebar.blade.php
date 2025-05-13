<div id="aside" class="min-w-60 md:flex   hidden z-10">
    <aside class="h-screen bg-white border-r-2 min-w-60 fixed z-50 top-0 pt-16 shadow-lg left-0 p-5 py-3  flex flex-col justify-between ">
        
        <ul >
            
            <x-sidelink href="/" class="{{ request()->is('/') ? 'bg-gradient-to-tr text-white' : '' }}">home <x-slot:name>Dashboard</x-slot:name> </x-sidelink>
            <x-sidelink href="/categorys" class="{{ request()->is('categorys') ? 'bg-gradient-to-r text-white' : '' }}">shopping_bag <x-slot:name>Category</x-slot:name> </x-sidelink>
            <x-sidelink href="/news" class="{{ request()->is('news') ? 'bg-gradient-to-r text-white' : '' }}">local_fire_department<x-slot:name>News</x-slot:name> </x-sidelink>
            <x-sidelink href="/trandings" class="{{ request()->is('trandings') ? 'bg-gradient-to-r text-white' : '' }}">trophy <x-slot:name>Trending</x-slot:name> </x-sidelink>
            <x-sidelink href="/pinjaman" class="{{ request()->is('pinjaman') ? 'bg-gradient-to-r text-white' : '' }}">overview<x-slot:name>Pinjaman</x-slot:name> </x-sidelink>
            <x-sidelink href="/profile" class="{{ request()->is('profile') ? 'bg-gradient-to-r text-white' : '' }}">person<x-slot:name>Profile</x-slot:name> </x-sidelink>
            <hr class="text-3xl">
            
        </ul>

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <x-sidelink>logout<x-slot:name>Logout</x-slot:name></x-sidelink>
            </button>
        </form>
        @endauth
        
        
        
    
    </aside>
</div>


