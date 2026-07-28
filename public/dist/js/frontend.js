
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll('.animate-section');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated');
                observer.unobserve(entry.target); 
            }
        });
    });

    sections.forEach((section) => observer.observe(section));
});


document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll('.animate-section-item');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 150); 

                observer.unobserve(entry.target);
            }
        });
    });

    items.forEach((item) => observer.observe(item));
});



