const mobileMenu = document.querySelector(".menu--js");
const closeBtn = document.querySelector(".closeMenuBtn--js");
const openBtns = document.querySelectorAll(".hamburger--js");
const navItems = document.querySelectorAll(".mobileNavItem--js"); // Pobieramy elementy nawigacyjne

const toggleMenu = () => {
    mobileMenu.classList.toggle("translate-x-[100%]");
    mobileMenu.classList.toggle("opacity-0");
    mobileMenu.classList.toggle("opacity-100");
};

const closeMenu = (event) => {
    if (
        !mobileMenu.contains(event.target) &&
        !event.target.closest(".hamburger--js")
    ) {
        mobileMenu.classList.add("translate-x-[100%]");
        mobileMenu.classList.add("opacity-0");
        mobileMenu.classList.remove("opacity-100");
    }
};

// Dodajemy obsługę kliknięcia w elementy nawigacyjne
navItems.forEach((item) => item.addEventListener("click", () => {
    mobileMenu.classList.add("translate-x-[100%]");
    mobileMenu.classList.add("opacity-0");
    mobileMenu.classList.remove("opacity-100");
}));

openBtns.forEach((btn) => btn.addEventListener("click", toggleMenu));
closeBtn?.addEventListener("click", toggleMenu);
document.addEventListener("click", closeMenu);

// ---- MOBILE DROPDOWN ----
document.querySelectorAll(".dropdown").forEach((dropdown) => {
    const button = dropdown.querySelector(".dropdownBtn--js");
    const dropdownUl = dropdown.querySelector(".dropdownUl--js");

    if (button && dropdownUl) {
        button.addEventListener("click", () => {
            dropdownUl.classList.toggle("max-h-0");
            dropdownUl.classList.toggle("opacity-0");
            dropdownUl.classList.toggle("max-h-[500px]");
            dropdownUl.classList.toggle("opacity-100");
        });
    }
});
