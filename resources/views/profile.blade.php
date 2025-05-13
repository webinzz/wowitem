@if (session('update'))
        <x-admincom.alert class="bg-green-400">{{ session('update') }}</x-admincom.alert>
    @endif

<x-layout.sidelay>
        <main class="w-full   shadow-lg rounded  bg-white grid grid-cols-4 gap-3 p-3 ">
            <div class="col-span-4 h-56 rounded overflow-hidden gap-5 p-4 sm:px-10 flex items-center" style="background-image: url('assets/trendingimg1.png'); background-size: cover; ">
                <img src="assets/profile.jpg" class="w-40 rounded-full" alt="">
                <div class="">
                    <h1 class=" text-white sm:text-2xl font-bold">{{ $user->email }}  </h1>
                    <button data-modal-target="default-modal{{ $user->id }}" data-modal-toggle="default-modal{{ $user->id }}" class="hover:opacity-75 transition-all duration-500 p-1  text-text mt-3 px-3  rounded bg-white ">edit profile</button>
    
                </div>
            </div>
            <div class="md:col-span-2 col-span-4 h-80 flex flex-col gap-3">
                <div class="w-full bg-blue-200  rounded-lg p-5 text-md text-text">UserName: {{ $user->name }}</div>
                <div class="w-full bg-blue-300  rounded-lg p-5 text-md text-white">email: {{ $user->email }}</div>
                <div class="w-full bg-blue-200  rounded-lg p-5 text-md text-text">telofon number: {{ $user->no_tlf }}</div>
                <div class="w-full bg-blue-300  rounded-lg p-5 text-md text-white">created_at : {{ $user->created_at }}</div>
            </div>

            <div class="md:col-span-2 col-span-4  grid grid-cols-4 gap-4 h-max">
                <div class="md:col-span-2 col-span-4 h-24 bg-blue-300 p-5 flex gap-3 text-white ">
                    <div class="rounded-full bg-white text-center pt-4 min-h-14 min-w-14">
                        <span class="material-symbols-outlined text-blue-500 ">
                            check
                            </span>
                    </div>
                    <div class="">
                        <p class="text-xl">{{ count($returned  ) }}</p>
                        <p class=" text-sm"> borowwed</p>
                    </div>
                </div>

                <div class="md:col-span-2 col-span-4 h-24 bg-blue-300 p-5 flex gap-3 text-white ">
                    <div class="rounded-full bg-white text-center pt-4 min-h-14 min-w-14">
                        <span class="material-symbols-outlined text-blue-400 ">
                            error
                            </span>
                    </div>
                    <div class="">
                        <p class="text-xl">{{ count($borrowing  ) }}</p>
                        <p class=" text-sm">must return item</p>
                    </div>
                </div>
                <div class="md:col-span-2 col-span-4 h-24 bg-blue-300 p-5 flex gap-3 text-white ">
                    <div class="rounded-full bg-white text-center pt-4 min-h-14 min-w-14">
                        <span class="material-symbols-outlined text-blue-400 ">
                            home_repair_service
                            </span>
                    </div>
                    <div class="">
                        <p class="text-xl">{{ count($pending  ) }}</p>
                        <p class=" text-sm">
                            on proses borrowing
                        </p>
                    </div>
                </div>
            </div>
              
        </main>

        {{-- edit form --}}
        <div id="default-modal{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full ">
            <div class="w-screen h-screen bg-[#0000004b]">
             <div class="relative p-4 w-full max-w-2xl mx-auto mt-5 max-h-full" >
                 <!-- Modal content -->
                 <div class="relative bg-white pb-10 rounded-lg shadow dark:bg-gray-700">
                     <!-- Modal header -->
                     <div class="flex items-center justify-between p-4 md:p-5 border-b  dark:border-gray-600">
                         <h3 class="text-xl font-semibold text-text dark:text-white">
                            Edit profile
                         </h3>
                         <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{ $user->id }}">
                             <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                             </svg>
                             <span class="sr-only">Close modal</span>
                         </button>
                     </div>
                     <!-- Modal body -->
                     <form action="{{ url('admin/users', $user->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex gap-5 w-full p-10">
                            <div class="w-1/2 bg-background border-2 relative overflow-hidden">
                                <img src="{{ asset('assets/profile.jpg') }}"
                                    class="h-full w-full object-cover" alt="Profile Picture" width="100">
                            </div>
        
                            <div class="w-1/2">
                                <h1 class="text-2xl font-semibold text-blue-400 mb-3">Edit user</h1>
                                <x-admincom.input value="{{ $user->name }}" placeholder="name" requaired type="text" name="name"></x-admincom.input>
                                <x-admincom.input value="{{ $user->no_tlf }}" placeholder="notelofon" requaired type="number" name="notlf"></x-admincom.input>
                                <x-admincom.input value="{{ $user->email }}" placeholder="email" type="email" requaired name="email"></x-admincom.input>
                                <input class="p-2 border border-blue-400 rounded-md w-full mt-2 focus:outline-none" id="password"   placeholder="password" type="password" name="password"></input>
                                <button id="mybutton"
                                    class="w-full mt-5 py-3  rounded-lg text-white   hover:opacity-75 bg-blue-500"
                                    type="submit"  disabled>update </button>
                            </div>
                        </div>
        
        
        
                    </form>
        
                 </div>
             </div>
             </div>
         </div>

        <script>
            const input = document.getElementById('password');
            const button = document.getElementById('mybutton');

                input.addEventListener('input', function () {
                    console.log(input.value.length)
                    if (input.value.length < 8 && input.value.length > 0) {
                        input.style.borderColor = "red"
                        button.style.opacity = 0.8
                
                    }else {
                        input.style.borderColor = "blue"
                        button.style.opacity = 1
                        button.disabled = false
                    }
                });  

                function closemassage(){
            let massage = document.getElementById('massage');
            massage.classList.add("hidden");
        }

        </script>
</x-layout.sidelay>




