import GLightbox from "glightbox";
import "glightbox/dist/css/glightbox.min.css";
const lightbox = GLightbox({ loop: true });



document.querySelectorAll('figure a').forEach(link => {
    const img = link.querySelector('img');
    if (img) {
        link.replaceWith(img); // Zamienia <a> na <img>
    }
});