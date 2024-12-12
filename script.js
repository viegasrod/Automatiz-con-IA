//document.getElementById('contact-form').addEventListener('submit', function (e) {
//    e.preventDefault();
//    alert('Gracias por tu mensaje. Nos pondremos en contacto con vos pronto.');
//});


// Menú hamburguesa
const menuToggle = document.getElementById('menu-toggle');
const navLinks = document.getElementById('nav-links');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active'); // Agrega o quita la clase 'active'
});

