// read more read less
function readMore(city) {
    let dots = document.querySelector(`.card[data-city="${city}"] .dots`);
    let moreText = document.querySelector(`.card[data-city="${city}"] .more`);
    let btnText = document.querySelector(`.card[data-city="${city}"] .myBtn1`);
    let qw = document.querySelector(`.card[data-city="${city}"] .qw`);

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.textContent = "READ MORE";
        moreText.style.display = "none";

        qw.classList.toggle("mystyle");
    } else {
        dots.style.display = "none";
        btnText.textContent = "READ LESS";
        moreText.style.display = "inline";
        qw.classList.toggle("mystyle");
    }
}
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[2];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


//nav
const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menu = document.querySelector(".menu-list");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
menuBtn.onclick = () => {
    menu.classList.add("active");
    menuBtn.classList.add("hide");
    cancelBtn.classList.add("show");
    body.classList.add("disabledScroll");
}
cancelBtn.onclick = () => {
    menu.classList.remove("active");
    menuBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    body.classList.remove("disabledScroll");
}

window.onscroll = () => {
    this.scrollY > 30 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}

//change color of div
$('.box').click(function () {
    $(this).toggleClass('bgcolor removebg');
});

$('.owl-carousel').owlCarousel({
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

