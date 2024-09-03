// Header JS
const showMenu = (toggleId, navId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        burgerIcon = toggle.querySelector('.ri-menu-fill'),
        closeIcon = toggle.querySelector('.ri-close-line');

    toggle.addEventListener('click', () => {
        nav.classList.toggle('show-menu');

        burgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    const navLinks = nav.querySelectorAll('a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('show-menu');
            burgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });
};

showMenu('nav-toggle', 'nav-menu');


// Slider JS
var container = document.getElementById('container');
var slider = document.getElementById('slider');
var slides = document.getElementsByClassName('slide').length;
var buttons = document.getElementsByClassName('btn');

var currentPosition = 0;
var currentMargin = 0;
var slidesPerPage = 0;
var slidesCount = slides - slidesPerPage;
var containerWidth = container.offsetWidth;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else if (w < 901) {
        slidesPerPage = 2;
    } else if (w < 1101) {
        slidesPerPage = 3;
    } else {
        slidesPerPage = 4;
    }
    slidesCount = slides - slidesPerPage;

    if (currentPosition > slidesCount) {
        currentPosition = slidesCount;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';

    updateButtonsState();
}

function updateButtonsState() {
    if (currentPosition === 0) {
        buttons[0].classList.add('inactive');
    } else {
        buttons[0].classList.remove('inactive');
    }

    if (currentPosition >= slidesCount) {
        buttons[1].classList.add('inactive');
    } else {
        buttons[1].classList.remove('inactive');
    }
}

function slideRight() {
    if (currentPosition > 0) {
        currentPosition--;
        currentMargin += (100 / slidesPerPage);
        slider.style.marginLeft = currentMargin + '%';
        updateButtonsState();
    }
}

function slideLeft() {
    if (currentPosition < slidesCount) {
        currentPosition++;
        currentMargin -= (100 / slidesPerPage);
        slider.style.marginLeft = currentMargin + '%';
        updateButtonsState();
    }
}


checkWidth();



// window.addEventListener('load', function () {
//     setTimeout(lazyLoad, 1000);
// });

// function lazyLoad() {
//     var card_images = document.querySelectorAll('.card-image');
//     card_images.forEach(function (card_image) {
//         var image_url = card_image.getAttribute('data-image-full');
//         var content_image = card_image.querySelector('img');
//         content_image.src = image_url;

//         content_image.addEventListener('load', function () {
//             card_image.style.backgroundImage = 'url(' + image_url + ')';
//             card_image.className = card_image.className + ' is-loaded';
//         });

//     });

// }
