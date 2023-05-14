const container = document.querySelector('.container');
const imageWrapper = document.querySelector('.image-wrapper');
const image = document.querySelector('.image-wrapper img');

let isDragging = false;
let startPosition = 0;
let currentTranslate = 0;
let prevTranslate = 0;
let animationId = 0;

function dragStart(e) {
    isDragging = true;
    startPosition = e.clientX;
    prevTranslate = currentTranslate;
    cancelAnimationFrame(animationId);
}

function dragEnd() {
    isDragging = false;
}

function drag(e) {
    if (isDragging) {
        const currentPosition = e.clientX;
        currentTranslate = prevTranslate + currentPosition - startPosition;
        image.style.transform = `translateX(${currentTranslate}px)`;
    }
}

container.addEventListener('mousedown', dragStart);
container.addEventListener('mouseup', dragEnd);
container.addEventListener('mousemove', drag);
