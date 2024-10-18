function showAbout() {
    document.getElementById("home-section").style.display = "none"; 
    document.getElementById("about-section").style.display = "block"; 
    document.getElementById("footer").style.display = "none";
    updateActiveLink('about');
}

function showHome() {
    document.getElementById("home-section").style.display = "flex"; 
    document.getElementById("about-section").style.display = "none"; 
    document.getElementById("footer").style.display = "block";
    updateActiveLink('home');
}

function updateActiveLink(page) {
    const links = document.querySelectorAll('nav ul li a'); 

    links.forEach(link => {
        link.classList.remove('active');
    });

    if (page === 'home') {
        links[0].classList.add('active');
    } else if (page === 'about') {
        links[1].classList.add('active');
    }
}

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
    setTimeout(showSlides, 3000); 
}
