document.addEventListener("DOMContentLoaded", function() {
    //header
    const cb = function(el, isIntersecting) {
        const header = document.querySelector(".header");
        if (isIntersecting) {
            header.classList.remove("triggered");
        } else {
            header.classList.add("triggered");
        }
    };

    //header-title
    const cb2 = function(el, isIntersecting) {
        const homeLink = document.querySelector(".header__home-link");
        if (isIntersecting) {
            homeLink.classList.remove("triggered");
        } else {
            homeLink.classList.add("triggered");
        }
    };

    //img
    const cb3 = function(el, isIntersecting) {
        if (isIntersecting) {
            el.classList.add("inview");
        }
    };

    const so = new ScrollObserver(".nav-trigger", cb, { once: false });
    const so2 = new ScrollObserver(".nav-trigger", cb2, { once: false });
    const so3 = new ScrollObserver(".cover-slide", cb3, { once: false });
});
