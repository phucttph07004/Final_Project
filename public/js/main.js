(function($) {
    window.onload = function() {
        $(document).ready(function() {
            homeSlider();
            feedback();
            gallerySlider();
            showMenuMobile();
            teacherSlider();
        });
    };
})(jQuery);

function homeSlider() {
    $('.homeSlider-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        dotsEach: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true,
            },
            576: {
                items: 1,
                nav: false,
                dots: true,
            },
            768: {
                items: 1,
                nav: false,
                dots: true,
            },
            1024: {
                items: 1,
                nav: false,
                dots: true,
            },

            1400: {
                items: 1,
                nav: false,
                dots: true,
            }
        }
    })
}

function feedback() {
    $('.feedback-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        dotsEach: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true,
            },
            576: {
                items: 1,
                nav: false,
                dots: true,
            },
            768: {
                items: 1,
                nav: false,
                dots: true,
            },
            1024: {
                items: 1,
                nav: false,
                dots: true,
            },

            1400: {
                items: 1,
                nav: false,
                dots: true,
            }
        }
    })
}

function gallerySlider() {
    $('.gallery-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false,
                dots: false,
            },
            576: {
                items: 3,
                nav: false,
                dots: false,
            },
            768: {
                items: 4,
                nav: false,
                dots: false,
            },
            1024: {
                items: 4,
                nav: false,
                dots: false,
            },

            1400: {
                items: 5,
                nav: false,
                dots: false,
            }
        }
    })
}

function teacherSlider() {
    $('.teacher-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: false,
            },
            576: {
                items: 3,
                nav: false,
                dots: false,
            },
            768: {
                items: 3,
                nav: false,
                dots: false,
            },
            1024: {
                items: 3,
                nav: false,
                dots: false,
            },

            1400: {
                items: 4,
                nav: false,
                dots: false,
            }
        }
    })
}

function showMenuMobile() {
    var hamburger = document.querySelector('.hamburger');
    var headerMenu = document.querySelector('.header__menu');

    hamburger.addEventListener('click', function() {
        headerMenu.classList.toggle('menuMobile-show');
    })
}