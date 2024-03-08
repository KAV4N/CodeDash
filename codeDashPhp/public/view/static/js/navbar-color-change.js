var windowElement = document.querySelector('#wrapper-inside');
var navElement = document.querySelector('header');

windowElement.addEventListener('scroll', function() {
    if (windowElement.scrollTop > 50) {
        navElement.classList.add('scrolled');
    } else {
        navElement.classList.remove('scrolled');
    }
});
