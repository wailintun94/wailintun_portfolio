const container = document.querySelector(".container");

// Clear existing bubbles if any
container.querySelectorAll('.circle-container').forEach(el => el.remove());

for (let i = 0; i < 100; i++) {
    const circleContainer = document.createElement("div");
    circleContainer.classList.add("circle-container");

    const circle = document.createElement("div");
    circle.classList.add("circle");

    // Random size 4 to 12px
    const size = Math.floor(Math.random() * 8) + 4;
    circleContainer.style.width = `${size}px`;
    circleContainer.style.height = `${size}px`;

    // Random horizontal position (0% to 100%)
    const posX = Math.random() * 100;
    // Start slightly below visible area (110%)
    const startY = 110;
    circleContainer.style.left = `${posX}%`;
    circleContainer.style.top = `${startY}%`;

    // Random animation duration between 20s and 30s
    const duration = 20000 + Math.random() * 10000;
    // Random animation delay between 0 and duration
    const delay = Math.random() * duration;

    circleContainer.style.animationDuration = `${duration}ms`;
    circleContainer.style.animationDelay = `${delay}ms`;

    circleContainer.appendChild(circle);
    container.appendChild(circleContainer);
}
