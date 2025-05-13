<div id="createform" class="fixed w-full h-full bg-[rgba(0,0,0,.5)] hidden top-0 left-0 z-50" style="z-index: 1000">
    <form action="" method="post" enctype="multipart/form-data"
        class="relative px-7 py-12 sm:px-10 h-auto w-[90%] sm:w-1/2 mx-auto flex gap-5 mt-20 rounded bg-white">
        @csrf
        <span onclick="closebutton()"
            class="absolute right-0 top-0 text-text text-4xl cursor-pointer material-symbols-outlined">
            close
        </span>

        {{ $slot }}

    </form>
</div>