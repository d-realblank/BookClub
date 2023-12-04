const allNavLinks = document.querySelectorAll('.nav-links');
const windowPath = window.location.pathname;

allNavLinks.forEach(link =>{
    const linkPath = new URL(link.href).pathname;
    if((linkPath === windowPath) || (windowPath === '/index.html' && linkPath === '/')) {
        link.classList.add('active');
    }
})
