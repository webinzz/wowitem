<x-layout.sidelay>
    <main class="w-full grid justify-center grid-cols-6  gap-4 pb-8">
        
        {{-- herosection --}}
        <figure
            class="col-span-6  h-[23rem] bg-white shadow-lg relative sm:p-14 flex flex-col justify-center sm:justify-start text-center sm:text-start px-5">
            <div class="absolute w-full h-full bg-white  p-2 top-0 left-0">
                <img class="  w-full h-full  " src="assets/dashboardhero.png" alt="">
            </div>

            <h1 class="text-slate-50 text-2xl mb-3 font-bold  sm:w-1/2 z-10 ">Find any items you need, anywhere and anytime, with ease.</h1>
            <p class=" text-slate-50 text-lg sm:w-2/3 z-10 ">whether it's for work, study, or leisure. </p>
            <a href="categorys" class="border-2 z-10 bg-background p-1 mt-6 sm:mx-0 mx-auto hover:opacity-75 rounded w-36 text-center  text-text">View Product</a>
            

            <img class="absolute sm:block hidden w-1/2 right-10 h-5/6 bottom-3" src="{{ asset('vector/peminjaman.png') }}" alt="">
        </figure>

        {{-- informasi --}}
       <div class="col-span-6 grid-cols-8 gap-2 grid ">
        
        <div class="lg:col-span-2 col-span-4 bg-white p-5 flex gap-3 text-text shadow-md">
            <div class="rounded-full bg-blue-100 text-center pt-4 min-h-14 min-w-14">
                <span class="material-symbols-outlined text-blue-500 ">
                    home_repair_service
                    </span>
            </div>
            <div class="">
                <p class="text-xl">{{ count($items) }}</p>
                <p class=" text-sm">Items ready</p>
            </div>
        </div>

        <div class="lg:col-span-2 col-span-4 bg-white p-5 flex gap-3 text-text shadow-md">
            <div class="rounded-full bg-yellow-100 text-center pt-4 min-h-14 min-w-14">
                <span class="material-symbols-outlined text-yellow-400 ">
                    category
                    </span>
            </div>
            <div class="">
                <p class="text-xl">{{ count($categorys  ) }}</p>
                <p class=" text-sm">Total categorys</p>
            </div>
        </div>
        
        <div class="lg:col-span-2 col-span-4 bg-white p-5 flex gap-3 text-text shadow-md">
            <div class="rounded-full bg-teal-100 text-center pt-4 min-h-14 min-w-14">
                <span class="material-symbols-outlined text-teal-500">
                    check
                    </span>
            </div>
            <div class="">
                <p class="text-xl">{{ count($returned  ) }}</p>
                <p class=" text-sm">succes boroww</p>
            </div>
        </div>

       
        
        <div class="lg:col-span-2 col-span-4 bg-white p-5 flex gap-3 text-text shadow-md">
            <div class="rounded-full bg-pink-100 text-center pt-4 min-h-14 min-w-14">
                <span class="material-symbols-outlined text-pink-400 ">
                    error
                    </span>
            </div>
            <div class="">
                <p class="text-xl">{{ count($borrow  ) }}</p>
                <p class=" text-sm">must return item</p>
            </div>
        </div>
        
        

       </div>
        
        {{-- fiture --}}
        
        <div class="relative col-span-6 lg:col-span-4 shadow-lg  overflow-hidden h-96">
            <div id="slider" class="flex h-full transition-transform duration-500">
              <div class="w-full flex-shrink-0 h-full shadow-lg bg-white p-2">
                <img src="{{ asset('vector/categoory.png') }}" class="w-1/2 h-5/6 mt-4 mx-auto" alt="Image 1">
                <p class="text-center text-text text-xl">Many categories available </p>
              </div>
              <div class="w-full flex-shrink-0  shadow-lg bg-white p-2">
                <img src="{{ asset('vector/trending.png') }}" class="w-1/2 h-5/6 mt-4 mx-auto" alt="Image 1">
                <p class="text-center text-text text-xl">trending item in this week </p>
              </div>
              <div class="w-full flex-shrink-0  shadow-lg bg-white p-2">
                <img src="{{ asset('vector/news.png') }}" class="w-1/2 h-5/6 mt-4 mx-auto" alt="Image 1">
                <p class="text-center text-text text-xl">The newest items are available</p>
              </div>
              
            </div>

            <!-- Navigasi Slider -->
            <button onclick="prevSlide()" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-blue-100 text-blue-400 p-4 px-6 rounded-full">&#10094;</button>
            <button onclick="nextSlide()" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-blue-100 text-blue-400 p-4 px-6 rounded-full">&#10095;</button>
        </div>

          <div class="lg:col-span-2 col-span-6 flex flex-col gap-3">
            <div class="w-full bg-white relative -z-20 overflow-hidden shadow-lg rounded p-4 h-1/3 flex gap-4">
                <div class="min-w-60 rounded-full -z-10 bg-green-100 absolute min-h-60 left-0 bottom-0 translate-y-7  -translate-x-10"></div>
                <span class="material-symbols-outlined text-green-400 text-6xl">
                    category
                </span>
                <p class="text-xl pt-5 text-text text-right w-full">
                    Many categories available</p>
            </div>
            <div class="w-full bg-white relative -z-20 overflow-hidden shadow-lg rounded p-4 h-1/3 flex gap-4">
                <div class="min-w-60 rounded-full -z-10 bg-yellow-100 absolute min-h-60 right-1/2 bottom-0 translate-y-28  translate-x-1/2"></div>
                <p class="text-xl pt-5 text-text text-center w-full">
                    The newest items are available</p>
            </div>
            <div class="w-full bg-white relative -z-20 overflow-hidden shadow-lg rounded p-4 h-1/3 flex gap-4">
                <div class="min-w-60 rounded-full -z-10 bg-red-100 absolute min-h-60 right-0 bottom-0 translate-y-28  translate-x-16"></div>
                <p class="text-xl pt-3 text-text text-left w-full">
                    trending item in this week</p>
                    <span class="material-symbols-outlined text-red-400 mt-8 text-6xl">
                        trophy
                    </span>
            </div>
        </div>

        {{-- trending --}}
        <div class="col-span-6 bg-white p-3 relative rounded shadow-md">
            <div class="w-full  flex justify-between items-center text-text mb-4">
                <p class="text-xl">Trending this week</p>
                <a href="trandings" class="hover:opacity-75 cursor-pointer">view all</a>
            </div>
            <div class="h-80  w-full relative   overflow-x-scroll overflow-hidden">
                
                <div class=" w-max absolute h-80 flex gap-3 items-start">
                    @foreach ($trendings as $trend)
                    <x-tranding id="active" class="h-[100%]" :data="$trend"></x-tranding>
                    
                    
                    @endforeach
                </div>
            </div>
        </div>
        

        {{-- our product --}}
        <div class="lg:col-span-4 col-span-6     shadow-md bg-white rounded  p-3">
                <p class="text-xl text-text mb-3">Our product</p>
            <div class="grid xl:grid-cols-6 grid-cols-4  gap-4">
                @if($items->isEmpty())
                <div class="col-span-full ">
                    <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
                    <p class="text-center text-xl text-text">Items is undifined</p>
                </div>
                @else
                @for ($i = 0; $i < count($items); $i++ )
                    <x-barang :data="$items[$i]"></x-barang>
                    
                @endfor
                   
                @endif
                <a href="category" class="p-2 shadow hover:opacity-50 cursor-pointer col-span-full bg-background text-center">view all</a>

            </div>
        </div>
        
        {{-- news --}}
        <div class="lg:col-span-2 relative  col-span-6 shadow-md bg-white rounded  p-3 text-text flex flex-col gap-4">
                <p class="text-xl mb-2">Hot and news </p>
            
                @if($news->isEmpty())
                <div class="w-full ">
                    <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
                    <p class="text-center text-xl text-text ">Items is undifined</p>
                </div>
                @else
                 @foreach ($news as $new )
                     <a href="{{ url('item/'. $new->id_item) }}" class="hover:bg-slate-50 cursor-pointer flex gap-4">
                        <figure class="group w-24 min-w-20 h-28  bg-background border overflow-hidden" >
                            <img src="{{ asset("storage/". $new->image) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">
                        </figure>
                        <div class="">
                            <p class="font-semibold">{{ $new->name }}</p>
                            <p class="  text-text">{{ Str::limit($new['description'], 30) }}</p>

                        </div>
                     </a>
                 @endforeach
               
                @endif
                <a href="news" class="p-2 shadow hover:opacity-50 cursor-pointer  w-full bg-background text-center">view all</a>
                
        </div>

        {{-- footer --}}
        <x-footer></x-footer>
          

    </main>
//<script src="{{ asset('js/dashboard.js') }}"></script>

<script>
    let currentIndex = 0;

function showSlide(index) {
  const slider = document.getElementById("slider");
  const slides = slider.children;
  const totalSlides = slides.length;
  
  if (index >= totalSlides) currentIndex = 0;
  if (index < 0) currentIndex = totalSlides - 1;
  
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function nextSlide() {
  currentIndex++;
  showSlide(currentIndex);
}

function prevSlide() {
  currentIndex--;
  showSlide(currentIndex);
}
</script>
</x-layout.sidelay>
