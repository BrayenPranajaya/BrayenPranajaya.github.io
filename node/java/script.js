// Modal elements
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const closeButtons = document.getElementsByClassName('close');
const showRegisterLink = document.getElementById('showRegister');
const showLoginLink = document.getElementById('showLogin');

// Modal functions
function showLoginModal(e) {
    if (e) e.preventDefault();
    loginModal.style.display = 'flex';
    registerModal.style.display = 'none';
}

function showRegisterModal(e) {
    if (e) e.preventDefault();
    registerModal.style.display = 'flex';
    loginModal.style.display = 'none';
}

function closeModal() {
    loginModal.style.display = 'none';
    registerModal.style.display = 'none';
}

// Event listeners for modals
loginLink.addEventListener('click', showLoginModal);
registerLink.addEventListener('click', showRegisterModal);
showRegisterLink.addEventListener('click', showRegisterModal);
showLoginLink.addEventListener('click', showLoginModal);

// Close button event listeners
Array.from(closeButtons).forEach(button => {
    button.addEventListener('click', closeModal);
});

// Close modal when clicking outside
window.addEventListener('click', (event) => {
    if (event.target === loginModal || event.target === registerModal) {
        closeModal();
    }
});

// Hero slider functionality
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[n].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

// Auto-advance slides every 3 seconds
setInterval(nextSlide, 3000);

    // Mendapatkan elemen yang diperlukan
    const searchToggle = document.querySelector('.search-toggle');
    const searchBar = document.querySelector('.search-bar');
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    // Fungsi untuk toggle search bar
    searchToggle.addEventListener('click', () => {
        searchBar.classList.toggle('active');
        searchToggle.classList.toggle('active');
    });

    // Fungsi untuk toggle navbar hamburger
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    // Menghapus kelas aktif saat ukuran layar lebih dari 768px
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            searchBar.classList.remove('active');
            searchToggle.classList.remove('active');
            navLinks.classList.remove('active');
        }
    });

    // Menyembunyikan search bar saat di klik di luar
    document.addEventListener('click', (event) => {
        if (!searchBar.contains(event.target) && !searchToggle.contains(event.target)) {
            searchBar.classList.remove('active');
            searchToggle.classList.remove('active');
        }
        if (!navLinks.contains(event.target) && !hamburger.contains(event.target)) {
            navLinks.classList.remove('active');
        }
    });
