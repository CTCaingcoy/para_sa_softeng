let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("slides");
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    
    slideIndex++;
    
    if (slideIndex > slides.length) {
        slideIndex = 1; 
    }
    
    slides[slideIndex - 1].style.display = "block"; 
    slides[slideIndex - 1].classList.add("fade"); 

    setTimeout(showSlides, 3000); 
}