

document.addEventListener("DOMContentLoaded", function () {
    let navList = document.querySelector(".nav-list");
    let btn = document.getElementById("btn");
    let cancelBtn = document.getElementById("cancel-btn");

    btn.addEventListener("click", function () {
        navList.classList.add("navActive");
        btn.style.display = "none";
        cancelBtn.style.display = "block";
    });

    cancelBtn.addEventListener("click", function () {
        navList.classList.remove("navActive");
        btn.style.display = "block";
        cancelBtn.style.display = "none";
    });
});

const carousel = document.querySelector(".carousel");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");

let index = 0;

function updateCarousel() {
    carousel.style.transform = `translateX(${-index * 100}%)`;
}

nextBtn.addEventListener("click", () => {
    index = (index + 1) % slides.length;
    updateCarousel();
});

prevBtn.addEventListener("click", () => {
    index = (index - 1 + slides.length) % slides.length;
    updateCarousel();
});

// Avtomatik slayd o'tkazish (ixtiyoriy)
setInterval(() => {
    index = (index + 1) % slides.length;
    updateCarousel();
}, 3000);


