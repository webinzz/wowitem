<x-layout.sidelay>
    <main class="w-full min-h-[89vh] overflow-hidden relative   p-10  shadow-lg rounded  bg-white grid grid-cols-5 gap-3 ">
        @if($items->isEmpty())
        <div class="col-span-5 pb-20">
            <img src="{{ asset('assets/itemkosong.png') }}" alt="No Items" class=" mx-auto">
            <p class="text-center text-xl text-text">Items is undifined</p>
        </div>
        @else
            
        <div class="absolute  col-span-5 w-full  h-full bg-white flex overflow-hidden  p-2 top-0 left-0">
            <img src="{{  asset('assets/heroprofile.png')}}" class="w-screen object-cover"></img>
        </div>
        <div class="col-span-3 h-36  text-white z-10">
            <p id="itemName" class="text-2xl font-bold mb-3 ">Items trending and loved by many users</p>
            <p id="itemDescription" class="text-lg sm:block hidden ">These are the most borrowed items. Don't miss out on the hottest items ready for you to borrow!</p>
        </div>


        <div class="col-span-2 relative z-10 ">
            <div class="flex absolute right-0 bottom-0 gap-2 text-text">
                <button  id="back" onclick="prevSlide()" class="rounded-full cursor-pointer w-max p-1 px-3 bg-white ">
                    <span class="material-symbols-outlined mt-2">
                        arrow_back
                        </span>
                </button>
                <div onclick="nextSlide()" class="rounded-full w-max cursor-pointer p-1 px-3 bg-white">
                    <span class="material-symbols-outlined mt-2">
                        arrow_forward
                        </span>
                </div>
            </div>
            
        </div>
        <div class="col-span-5  overflow-hidden ">
        <div id="slider" class=" h-80  flex gap-4 duration-1000 transition-all items-center ">

            @foreach ($items as $item)
                <x-tranding id="active" class="h-[90%]" :data="$item"></x-tranding>
                
                
            @endforeach

        </div>
        </div>




        @endif
        
    </main>   
        <script>
            



//geser
let currentIndex = 0;



function showSlide(index) {
  const slider = document.getElementById("slider");
  const slides = slider.children;
  const totalSlides = slides.length;
  
  if (index >= totalSlides){
    currentIndex = 0;

  } else if (index < 0) {
    currentIndex = totalSlides - 1
  };
  
  
  slider.style.transform = `translateX(-${currentIndex * 272}px)`;
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
    <script src="{{ asset('js/trending.js') }}"></script>
    
</x-layout>
