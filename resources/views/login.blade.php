    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-admincom.alert class="bg-red-400">{{ $error }}</x-admincom.alert>
        @endforeach

    @endif

    @if (session('error'))
        <x-admincom.alert class="bg-red-400">{{ session('error') }}</x-admincom.alert>
    @endif
    @if (session('succes'))
        <x-admincom.alert class="bg-green-400">{{ session('succes') }}</x-admincom.alert>
    @endif

    <x-layout.layouthtml>
        <div class="bg-background w-screen overflow-x-hidden"
            style="background-image: url('{{ asset("assets/bglogin.png") }}');
        background-position: top ;
        background-size: 110% ">

            <main
                class="sm:w-[69%] w-[95%]  overflow-hidden  shadow-xl h-[90vh] sm:h-[80vh]  m-auto sm:mt-12 mt-4 block  lg:flex bg-white">

                <div class="container w-full lg:w-1/2 relative h-full overflow-">
                    {{-- nav --}}

                    <nav class="bg-white w-full p-3">
                        <ul class="flex gap-5 cursor-pointer text-text">
                            <li id="loginlink" onclick="muncullogin()"
                                class="border-b-2  border-blue-500 text-blue-400 p-2 transition px-4   hover:opacity-50 ">
                                Sign in</li>
                            <li id="registerlink" onclick="munculregister()"
                                class="p-2 px-4 border-blue-500 transition hover:opacity-50  ">Sign Up </li>
                        </ul>
                    </nav>

                    {{-- form login --}}

                    <form id="Loginform" action="" method="POST"
                        class="text-text sm:p-8 sm:px-10 p-5 w-full h-full absolute bg-white z-10">
                        @csrf
                        <h1 class="lg:text-2xl text-2xl font-semibold text-blue-400">Wellcome Back</h1>
                        <br>
                        <label for="" class="w-full">
                            <p>Enter Your Email</p>
                            <input required type="email1" name="email"
                                class="w-full py-2 px-3 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
                        </label>
                        <br>
                        <br>
                        <label for="" class="w-full">
                            <p>Enter Your Password</p>
                            <input required type="password" name="password"
                                class="w-full px-3 py-2 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
                        </label>
                        <br>
                        <br>
                        <br>


                        <input class="w-full py-3 rounded text-white  hover:opacity-75 bg-blue-500" type="submit"
                            name="action" value="login">

                    </form>

                    {{-- form resgister --}}
                    <form id="Registerform" action="" method="POST"
                        class=" p-5 pt-5 sm:px-10 text-text h-auto  w-full absolute bg-white">
                        @csrf
                        <h1 class="text-2xl font-semibold text-blue-400 mb-3">Create New Account </h1>
                            <label for="" class="w-full ">
                                <p class="text-sm"> Your Name:</p>
                                <input  value="" type="text" required name="username"
                                    class="w-full py-2 px-3 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
    
                            </label>
                            <label for="" class="w-full">
                                <p class="text-sm">Telofon number:</p>
                                <input id="notlf" type="number" name="notlf" required
                                    class="w-full py-2 px-3 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
                            </label>
                        <label for="" class="w-full my-1">
                            <p class="text-sm">Enter Your Email:</p>
                                
                            <input type="email" name="email" required
                                class="w-full py-2 px-3 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
                        </label>
                        <label for="" class="w-full my-1">
                            <div class="flex justify-between">
                                <p class="text-sm">Enter Your password:</p>
                                <p id="error" class="text-sm text-red-400 hidden">must 8 character</p>
                            </div>
                            <input id="password" type="password" name="password" required
                                class=" w-full py-2 px-3 my-1 border rounded border-blue-400 focus:border-blue-800 focus:outline-none">
                        </label>
                        <button id="mybutton" name="action" value="register" type="submit" disabled
                            class="w-full mt-7 py-3 rounded-lg text-white   hover:opacity-75 bg-blue-500">Sign Up
                        </button>


                    </form>
                </div>

                {{-- figure --}}
                <figure
                    class="bg-gradient-to-r from-blue-300 to-blue-600 xl:px-20   p-10 py-28 w-full sm:w-1/2 hidden sm:flex">
                    <img src="{{ asset('assets/biglogo.png') }}" class="mx-auto rounded-3xl align-middle object-cover" alt="">
                </figure>

            </main>


        </div>
        <script>
            let loginform = document.getElementById("Loginform");
let loginlink = document.getElementById("loginlink");
let registerlink = document.getElementById("registerlink");

function muncullogin (){
    loginform.classList.remove("hidden");
    loginlink.classList.add("border-b-2");
    loginlink.classList.add("text-blue-400");
    registerlink.classList.remove("border-b-2");
    registerlink.classList.remove("text-blue-400");

}

function munculregister (){
    loginform.classList.add("hidden");
    loginlink.classList.remove("border-b-2");
    loginlink.classList.remove("text-blue-400");
    registerlink.classList.add("border-b-2");
}

function closemassage(){
    let massage = document.getElementById('massage');
    massage.classList.add("hidden"); 
}

//register
const input = document.getElementById('password');
const button = document.getElementById('mybutton');
const massage = document.getElementById('error');

    input.addEventListener('input', function () {
        console.log(input.value.length)
        if (input.value.length < 8) {
            massage.style.display = "block"
            input.style.borderColor = "red"
            button.style.opacity = 0.8
    
        } else {
            massage.style.display = "none"
            input.style.borderColor = "blue"
            button.style.opacity = 1
            button.disabled = false
        }
    });  
        </script>
        

    </x-layout.layouthtml>
