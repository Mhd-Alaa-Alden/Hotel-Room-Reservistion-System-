import "./bootstrap";

const welcomeText = document.getElementById("welcomeText");
// const spanText = document.getElementById('spanText');
const text = "Welcome to ANS Hotel";
// const span = "We Are Creative space";
let index = 0;
// here 121212
function typeWriter() {
    if (index < text.length) {
        welcomeText.textContent += text.charAt(index);
        index++;
        setTimeout(typeWriter, 200);
    } else {
        index = 0;
        welcomeText.textContent = "";
        setTimeout(typeWriter, 900);
    }
}
typeWriter();
// ----------------------------------------

//  Script For Landing Slider Auto
// start let landing
let landing = document.querySelector(".landing-page");

// Get Array  of images
let Arrayimages = ["1.png", "2.png", "3.png"];

setInterval(() => {
    // get random number
    let randomNumber = Math.floor(Math.random() * Arrayimages.length);

    // change background image url
    landing.style.backgroundImage =
        'url("../img/photos/' + Arrayimages[randomNumber] + '")';
}, 2000);

var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});

src = "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js";
src =
    "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js";
integrity =
    "sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM";
crossorigin = "anonymous";

src = "https://code.jquery.com/jquery-3.6.0.min.js";
src = "https://code.jquery.com/ui/1.12.1/jquery-ui.min.js";
