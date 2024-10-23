// Dark/Light Mode Toggle
const modeToggle = document.getElementById('mode-toggle');
const body = document.body;

modeToggle.addEventListener('click', () => {
    // Toggle between dark and light mode
    body.classList.toggle('dark-mode');
    
    // Update the button text
    if (body.classList.contains('dark-mode')) {
        modeToggle.textContent = 'Light';
    } else {
        modeToggle.textContent = 'Dark';
    }
});