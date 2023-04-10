//! Add Event
function add_event(selector, event, callback) {
    let el = document.querySelectorAll(selector);
    el.forEach(function (value) {
        value.addEventListener(event, callback);
    });
}


//! Variables
let cartShopping = document.querySelector('.cart-shopping');
let backClose = document.querySelector('.back-close');
//!


//! Bring cart modal into
add_event('.cart-btn', 'click', handle_cart);

function handle_cart() {
    cartShopping.classList.add('active-left');
    backClose.classList.add('active-left');
}


//! Close cart with black background
add_event('.back-close', 'click', handle_close);

function handle_close() {
    cartShopping.classList.remove('active-left');
    backClose.classList.remove('active-left');
}


//! Close cart with close button
add_event('.basket-close', 'click', handle_close);


//?Menu
(() => {

    const openNavMenu = document.querySelector(".open-nav-menu"),
        closeNavMenu = document.querySelector(".close-nav-menu"),
        navMenu = document.querySelector(".nav-menu"),
        menuOverlay = document.querySelector(".menu-overlay"),
        mediaSize = 991;

    openNavMenu.addEventListener("click", toggleNav);
    closeNavMenu.addEventListener("click", toggleNav);
    // close the navMenu by clicking outside
    menuOverlay.addEventListener("click", toggleNav);

    function toggleNav() {
        navMenu.classList.toggle("open");
        menuOverlay.classList.toggle("active");
        document.body.classList.toggle("hidden-scrolling");
    }

    navMenu.addEventListener("click", (event) => {
        if (event.target.hasAttribute("data-toggle") &&
            window.innerWidth <= mediaSize) {
            // prevent default anchor click behavior
            event.preventDefault();
            const menuItemHasChildren = event.target.parentElement;
            // if menuItemHasChildren is already expanded, collapse it
            if (menuItemHasChildren.classList.contains("active")) {
                collapseSubMenu();
            } else {
                // collapse existing expanded menuItemHasChildren
                if (navMenu.querySelector(".menu-item-has-children.active")) {
                    collapseSubMenu();
                }
                // expand new menuItemHasChildren
                menuItemHasChildren.classList.add("active");
                const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                subMenu.style.maxHeight = subMenu.scrollHeight + "px";
            }
        }
    });

    function collapseSubMenu() {
        navMenu.querySelector(".menu-item-has-children.active .sub-menu")
            .removeAttribute("style");
        navMenu.querySelector(".menu-item-has-children.active")
            .classList.remove("active");
    }

    function resizeFix() {
        // if navMenu is open ,close it
        if (navMenu.classList.contains("open")) {
            toggleNav();
        }
        // if menuItemHasChildren is expanded , collapse it
        if (navMenu.querySelector(".menu-item-has-children.active")) {
            collapseSubMenu();
        }
    }

    window.addEventListener("resize", function () {
        if (this.innerWidth > mediaSize) {
            resizeFix();
        }
    });

})();
//?


//! Swiper
var swiper = new Swiper(".mySwiper", {
    // Default parameters
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 40
        },

        1200: {
            slidesPerView: 5,
            spaceBetween: 30
        },
    },
    direction: 'horizontal',
    loop: false,
    allowTouchMove: true,
    speed: 600,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});

var swiper2 = new Swiper(".mySwiper2", {
    // Default parameters
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 5
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 40
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 15
        },
    },
    direction: 'horizontal',
    loop: false,
    allowTouchMove: true,
    speed: 600,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});

var swiper3 = new Swiper(".mySwiper3", {
    // Default parameters
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 5
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 40
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 15
        },
    },
    direction: 'horizontal',
    loop: false,
    allowTouchMove: true,
    speed: 600,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});

var swiper6 = new Swiper(".mySwiper6", {
    // Default parameters
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 0
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 0
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 40
        },

        1200: {
            slidesPerView: 5,
            spaceBetween: 0
        },
    },
    direction: 'horizontal',
    loop: false,
    allowTouchMove: true,
    speed: 600,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});


//! Change Image
// function setNewImage() {
//     let image = document.querySelectorAll('.product-image');
//     image.forEach(function (value) {
//         value.addEventListener('mouseover', function (e) {
//             e.currentTarget.src = "{{ asset('image/cover_2').'/'.$products->cover_2 }}";
//         });
//     });
// }
//
// function setOldImage() {
//     let image = document.querySelectorAll('.product-image');
//     image.forEach(function (value) {
//         value.addEventListener('mouseout', function (e) {
//             e.currentTarget.src = "{{ asset('image/cover_1').'/'.$products->cover_1 }}";
//         });
//     });
// }
//
// setNewImage();
// setOldImage();


//! Product Gallery
var swiper4 = new Swiper(".mySwiper4", {
    loop: false,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});

var swiper5 = new Swiper(".mySwiper5", {
    loop: false,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper4,
    },
});


//! Active Box
let tabProductItem = document.querySelectorAll(".tab-product-item");
let contentBox = document.querySelectorAll(".content-box");

tabProductItem.forEach(function (tab, tab_index) {
    tab.addEventListener("click", function () {
        tabProductItem.forEach(function (tab) {
            tab.classList.remove("active");
            tab.classList.remove("active-border");
        })
        tab.classList.add('active');
        tab.classList.add('active-border');

        contentBox.forEach(function (content, content_index) {
            if (content_index == tab_index) {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        });
    });
});


//! Filter Exist And Sale
function change() {
    let results = Array.from(document.querySelectorAll('.filters > div'));
    // Hide all results
    results.forEach(function (result) {
        result.style.display = 'none';
    });
    // Filter results to only those that meet ALL requirements:
    Array.from(document.querySelectorAll('input[rel]:checked'), function (input) {
        const attrib = input.getAttribute('rel');
        results = results.filter(function (result) {
            return result.classList.contains(attrib);
        });
    });
    // Show those filtered results:
    results.forEach(function (result) {
        result.style.display = 'block';
    });
}

change();


//! Filter Price
// let slider = document.querySelector('.slider');
// noUiSlider.create(slider, {
//     startRange: [25000, 3000000],
//     connect: true,
//     range: {
//         'min': 25000,
//         'max': 3000000,
//     },
//     pips: {
//         mode: 'steps',
//         stepped: true,
//         density: 4,
//     }
// });


//! More Product Category
let MoreProductCategoryBtn = document.querySelectorAll('.product-arrow');
let MoreProductCategory = document.querySelectorAll('.more-product-category');

MoreProductCategoryBtn.forEach(function (tab, tab_index){
    tab.addEventListener('click', function () {
        MoreProductCategoryBtn.forEach(function (tab){
            tab.classList.remove('active');
            tab.classList.remove('active-product-arrow');
        });
        tab.classList.add('active');
        tab.classList.add('active-product-arrow');

        MoreProductCategory.forEach(function (content, content_index){
            if (content_index == tab_index) {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        });

    });
});


//! More Category
let productRowRespon = document.querySelector('.product-row-respon');
add_event('.more-category', 'click', handle_category);

function handle_category() {
    productRowRespon.classList.toggle('active-block');
}


//! See Filters
let filterBoxAll = document.querySelector('.filter-box-all');
add_event('.filter-phone', 'click', handle_right_modal);

function handle_right_modal() {
    filterBoxAll.classList.add('active-right');
    backClose.classList.add('active-right');
}

add_event('.filter-phone-close', 'click', handle_right_modal_close);
add_event('.back-close', 'click', handle_right_modal_close);

function handle_right_modal_close() {
    filterBoxAll.classList.remove('active-right');
    backClose.classList.remove('active-right');
}


//! Profile
// let dropProfileBtn = document.querySelector('.drop-profile-btn');
// let dropProfile = document.querySelector('.drop-profile');
// dropProfileBtn.addEventListener('click', function (){
//     dropProfile.classList.toggle('active-opacity');
// });


//! Reply Comment
function reply(caller){
    document.getElementById('comment_id').value = $(caller).attr('data-comment-id');
    $('.reply-div').insertAfter($(caller));
    $('.reply-div').show();
}

function reply_close(caller){
    $('.reply-div').hide();
}


//! Plus And Minus
let plus = document.querySelector('.plus');
let minus = document.querySelector('.minus');
let numberOrder = document.querySelector('.number-order');

plus.addEventListener('click', function () {
    if (numberOrder.value < 7) {
        numberOrder.value++;
    }
});

minus.addEventListener('click', function () {
    if (numberOrder.value > 1) {
        numberOrder.value--;
    }
});

