function handleSearch() {
    const searchInput = document.querySelector('.search-cart input');
    searchInput.addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        console.log("Searching for:", searchValue);
    });
}

function handleNavigation() {
    const navLinks = document.querySelectorAll('nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });
}

function handleNavToggle() {
    const navToggle = document.getElementById('nav-toggle');
    const navList = document.querySelector('nav ul');

    navToggle.addEventListener('click', () => {
        navList.classList.toggle('active');
    });
}

function init() {
    handleSearch();
    handleNavigation();
    handleNavToggle();
}

document.addEventListener('DOMContentLoaded', init);
