const primaryNav = document.querySelector('.nav-links');
const navToggle = document.querySelector('.toggle');

navToggle.addEventListener('click', () => {
    const visible = primaryNav.getAttribute('data-visible');
    if(visible === 'false') {
        primaryNav.setAttribute('data-visible', true);
        primaryNav.setAttribute("aria-expanded", true)
    } else if (visible === 'true') {
        primaryNav.setAttribute('data-visible', false);
        primaryNav.setAttribute("aria-expanded", false)
    }
});
