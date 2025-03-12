document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");

    const imageItems = document.querySelectorAll(".image-item");

    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const title = this.getAttribute("data-title");

            filterButtons.forEach((btn) => {
                btn.classList.remove("gallery-btn");
            });

            // Add classes to the clicked button
            this.classList.add("gallery-btn");

            if (title === "") {
                imageItems.forEach((item) => {
                    item.style.display = "block";
                });
            } else {
                imageItems.forEach((item) => {
                    item.style.display = "none";
                });

                imageItems.forEach((item) => {
                    if (item.getAttribute("data-title") === title) {
                        item.style.display = "block";
                    }
                });
            }
        });
    });
});