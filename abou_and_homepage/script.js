function showAbout() {
    document.getElementById("home-section").style.display = "none";
    document.getElementById("about-section").style.display = "block";
    document.getElementById("footer").style.display = "none"; // Hide footer
    updateActiveLink('about');
}

function showHome() {
    document.getElementById("home-section").style.display = "flex"; // Change display to flex
    document.getElementById("about-section").style.display = "none";
    document.getElementById("footer").style.display = "block"; // Show footer
    updateActiveLink('home');
}

function updateActiveLink(page) {
    const homeLink = document.querySelector('nav ul li a[href="#"]');
    const aboutLink = document.querySelector('nav ul li a[href="#"] + a');
    const productLink = document.querySelector('nav ul li a[href="#"] + a + a');

    homeLink.classList.remove('active');
    aboutLink.classList.remove('active');
    productLink.classList.remove('active');

    if (page === 'home') {
        homeLink.classList.add('active');
    } else if (page === 'about') {
        aboutLink.classList.add('active');
    }
}
