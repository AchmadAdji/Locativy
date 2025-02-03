let currentIndex = 0;

function moveSlide(direction) {
    const slider = document.querySelector(".slider");
    const cards = document.querySelectorAll(".card");
    const totalCards = cards.length;
    const cardWidth = cards[0].offsetWidth + 20; // Tambah margin

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalCards - 1;
    } else if (currentIndex >= totalCards) {
        currentIndex = 0;
    }

    const offset = -currentIndex * cardWidth;
    slider.style.transform = `translateX(${offset}px)`;
}
