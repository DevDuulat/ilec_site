document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelectorAll(".accordion-header");
    const images = document.querySelectorAll(".accordion-image");

    const defaultActiveIndex = 2;
    if (headers[defaultActiveIndex]) {
        const defaultItem = headers[defaultActiveIndex].closest(".accordion-item");
        defaultItem.classList.add("active");
        const defaultContent = defaultItem.querySelector(".accordion-content");
        defaultContent.classList.remove("hidden");
        images[defaultActiveIndex].classList.remove("hidden");
    }

    headers.forEach((header, index) => {
        header.addEventListener("click", function () {
            document.querySelectorAll(".accordion-item").forEach((item) => {
                item.classList.remove("active");
                const content = item.querySelector(".accordion-content");
                if (content) content.classList.add("hidden");

                const h = item.querySelector(".accordion-header");
                h.classList.remove("font-semibold", "text-gray-900");
                h.classList.add("font-medium", "text-gray-600");
            });

            images.forEach((img) => img.classList.add("hidden"));

            const item = this.closest(".accordion-item");
            item.classList.add("active");
            this.classList.remove("font-medium", "text-gray-600");
            this.classList.add("font-semibold", "text-gray-900");

            const content = item.querySelector(".accordion-content");
            if (content) content.classList.remove("hidden");

            if (images[index]) {
                images[index].classList.remove("hidden");
            }
        });
    });
});
