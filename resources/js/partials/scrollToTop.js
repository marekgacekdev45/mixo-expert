const scrollBtn = document.querySelector("#scrollToTop");

window.addEventListener("scroll", function () {
    if (window.scrollY >= 100) {
        scrollBtn.classList.remove("opacity-0");
    } else {
        scrollBtn.classList.add("opacity-0");
    }
});

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
};

scrollBtn && scrollBtn.addEventListener("click", scrollToTop);