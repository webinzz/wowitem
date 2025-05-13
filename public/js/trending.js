



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
