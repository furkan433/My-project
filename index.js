const bar = document.getElementById('bar');
const nav = document.getElementById('navebbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}