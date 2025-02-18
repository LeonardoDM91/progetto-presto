const items = document.querySelectorAll('.item');
const options = {
    root: null, 
    rootMargin: '0px',
    threshold: 0.1 
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible'); 
            observer.unobserve(entry.target); 
        }
    });
}, options);

items.forEach(item => {
    observer.observe(item); 
});


const observeSection = () => {
    const section = document.querySelector("#dynamic-section");
    const h2 = section.querySelector("h2");
    const image = section.querySelector("img");
    const carousel = section.querySelector("#carouselExampleFade");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Mostra l'H2
                setTimeout(() => h2.classList.add("show"), 500);

                // Mostra l'immagine
                setTimeout(() => image.classList.add("show"), 1500);

                // Mostra il carosello
                setTimeout(() => carousel.classList.add("show"), 2500);

                // Una volta che la transizione è partita, smetti di osservare
                observer.disconnect();
            }
        });
    }, { threshold: 0.1 }); 

    observer.observe(section);
};

// Inizializza il codice quando il DOM è pronto
document.addEventListener("DOMContentLoaded", observeSection);


// Animazione per il form di registrazione e il contenuto di testo/immagine
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.animated-form');
    const content = document.querySelector('.animated-content');

    // Aggiungi la classe visible al caricamento della pagina
    form.classList.add('visible');
    content.classList.add('visible');
});

//vista categorie
document.addEventListener('DOMContentLoaded', () => {
    const categoryText = document.querySelector('.category-text');
    if (categoryText) {
        categoryText.classList.add('animate-in'); 
    }
});

//pubblica annuncio

document.addEventListener('DOMContentLoaded', () => {
    const bgImage = new Image();
    // bgImage.src = '../../media/background-4.jpg';
    bgImage.onload = () => {
        document.querySelector('.create-background').style.backgroundImage = `url('${bgImage.src}')`;
    };
});


document.addEventListener('DOMContentLoaded', () => {
    const categoryTextCreate = document.querySelector('.category-text-create');
    if (categoryTextCreate) {
        categoryTextCreate.classList.add('animate-in'); 
    }
});


 
    // Mostra/nascondi il pulsante in base allo scroll
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) { // Mostra il pulsante dopo 200px di scroll
            scrollToTopBtn.style.display = "flex";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    });

    // Funzione per tornare in cima alla pagina
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth" // Scorrimento animato
        });
    });


