$('#main').owlCarousel({
    loop: true,
    margin: 30,
    dots: true,
    nav: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            margin: 10,
            stagePadding: 40,
            dots: false,
        },
        600: {
            items: 1,
            margin: 20,
            stagePadding: 50,
            dots: false,
        },
        1000: {
            items: 3,
            margin: 20,
            // stagePadding: 50,
            dots: false,
        },
        1200: {
            items: 3,
            mouseDrag: false,
        },

    }
});

$('#nonLoop').owlCarousel({
    loop: false,
    margin: 30,
    dots: true,
    nav: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            margin: 10,
            stagePadding: 40,
            dots: false,
        },
        600: {
            items: 2,
            margin: 20,
            stagePadding: 50,
            dots: false,
        },
        1000: {
            items: 2,
            margin: 20,
            stagePadding: 50,
            dots: false,
        },
        1200: {
            items: 3,
            mouseDrag: false,
        }
    }
});

$('#nonLoop2').owlCarousel({
    loop: false,
    margin: 30,
    dots: true,
    nav: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            margin: 10,
            stagePadding: 40,
            dots: false,
        },
        600: {
            items: 2,
            margin: 20,
            stagePadding: 50,
            dots: false,
        },
        1000: {
            items: 2,
            margin: 20,
            stagePadding: 50,
            dots: false,
        },
        1200: {
            items: 3,
            mouseDrag: false,
        }
    }
});
// read more read less
// section-2
// function myFunction() {
//     var element = document.getElementById("myDIV1");
//     element.classList.toggle("section-2-toggled");
// }

// section-3
// function myFunction() {
//     var element = document.getElementById("myDIV2");
//     element.classList.toggle("section-2-toggled");
// }