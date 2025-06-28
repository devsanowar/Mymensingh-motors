function setupSlider(idSuffix) {
  const track = document.getElementById("sliderTrack" + idSuffix);
  const container = document.getElementById("sliderContainer" + idSuffix);
  const leftArrow = document.getElementById("arrowLeft" + idSuffix);
  const rightArrow = document.getElementById("arrowRight" + idSuffix);
  const pagination = document.getElementById("pagination" + idSuffix);

  let visibleCount;
  let currentIndex = 0;
  let cardWidth = 0;
  let autoSlide;

  function getVisibleCount() {
    const w = window.innerWidth;
    if (w <= 576) return 2;
    if (w <= 768) return 3;
    if (w <= 1024) return 4;
    return 5;
  }

  function cloneCards() {
    const cards = Array.from(track.children);
    visibleCount = getVisibleCount();
    const prefix = cards.slice(-visibleCount).map((c) => c.cloneNode(true));
    const suffix = cards.slice(0, visibleCount).map((c) => c.cloneNode(true));
    prefix.forEach((c) => track.insertBefore(c, track.firstChild));
    suffix.forEach((c) => track.appendChild(c));
    cardWidth = cards[0].offsetWidth + 15; // gap compensation
    currentIndex = visibleCount;
    track.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
    renderPagination();
  }

  function renderPagination() {
    const total = track.children.length - 2 * visibleCount;
    pagination.innerHTML = "";
    for (let i = 0; i < total; i++) {
      const dot = document.createElement("span");
      dot.className = "pagination-dot";
      if (i === 0) dot.classList.add("active");
      dot.addEventListener("click", () => goToSlide(i + visibleCount));
      pagination.appendChild(dot);
    }
  }

  function updateSlider(animate = true) {
    track.style.transition = animate ? "transform 0.5s ease-in-out" : "none";
    track.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
    const dots = pagination.querySelectorAll(".pagination-dot");
    dots.forEach((dot) => dot.classList.remove("active"));
    dots[
      (currentIndex - visibleCount) % (track.children.length - 2 * visibleCount)
    ].classList.add("active");
  }

  function slide(dir) {
    currentIndex += dir;
    updateSlider(true);
    const total = track.children.length;
    if (currentIndex === total - visibleCount || currentIndex === 0) {
      setTimeout(() => {
        track.style.transition = "none";
        currentIndex =
          currentIndex === 0 ? total - 2 * visibleCount : visibleCount;
        track.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
        updateSlider(false);
      }, 510);
    }
  }

  function goToSlide(index) {
    currentIndex = index;
    updateSlider(true);
  }

  function startAutoSlide() {
    autoSlide = setInterval(() => slide(1), 5000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlide);
  }

  leftArrow.addEventListener("click", () => slide(-1));
  rightArrow.addEventListener("click", () => slide(1));
  container.addEventListener("mouseenter", stopAutoSlide);
  container.addEventListener("mouseleave", startAutoSlide);
  window.addEventListener("resize", () => location.reload());

  cloneCards();
  startAutoSlide();
}

setupSlider("1"); // Featured
setupSlider("2"); // Best Selling
