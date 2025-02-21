const setupSlider = () => {
  const config = {
    slider: ".slider",
    slides: ".slider__image",
    prevButton: ".slider__prev-button",
    nextButton: ".slider__next-button",
    autoPlayInterval: 3000,
    swipeThreshold: 50,
  };

  const elements = {
    sliderElement: document.querySelector(config.slider),
    slides: document.querySelectorAll(config.slides),
    prevButton: document.querySelector(config.prevButton),
    nextButton: document.querySelector(config.nextButton),
  };

  return { config, elements };
};

const sliderView = (elements) => {
  const updateSlidePosition = (index, enableTransition) => {
    elements.sliderElement.style.transition = enableTransition ? "transform 0.5s ease" : "none";
    elements.sliderElement.style.transform = `translateX(-${index * 100}%)`;
  };

  const updateImageSource = () => {
    const isSmallScreen = window.matchMedia("(max-width: 700px)").matches;
    elements.slides.forEach((image) => {
      const newSrc = isSmallScreen ? image.dataset.small : image.dataset.large;
      if (image.src !== newSrc) image.src = newSrc;
    });
  };

  return {
    updateSlidePosition,
    updateImageSource,
  };
};

const sliderModel = (totalSlides, toggleAutoPlay) => {
  let currentIndex = 0;
  let isSliding = false;

  // Hàm chuyển slide
  const navigateSlide = (direction) => {
    if (isSliding) {
      return { index: currentIndex, isLooping: false, isReverseLooping: false };
    }

    isSliding = true;

    const nextIndex = (currentIndex + direction + totalSlides) % totalSlides;

    // Tạm dừng autoplay khi người dùng tương tác
    toggleAutoPlay(false);

    setTimeout(() => {
      isSliding = false;
      toggleAutoPlay(true);
    }, 500); // Thời gian chuyển slide

    const isLooping = nextIndex === 0 && direction > 0; // Điều kiện về slide đầu
    const isReverseLooping = nextIndex === totalSlides - 1 && direction < 0; // Slide cuối

    currentIndex = nextIndex;

    // trả về index và trạng thái "loop"
    return { index: currentIndex, isLooping, isReverseLooping };
  };

  return {
    navigateSlide,
    getCurrentIndex: () => currentIndex,
  };
};

export const sliderController = () => {
  const { config, elements } = setupSlider();
  let autoPlayTimer = null;
  let startX = 0;

  const attachEvents = () => {
    elements.prevButton.addEventListener("click", () => handleSlideChange(-1));
    elements.nextButton.addEventListener("click", () => handleSlideChange(1));

    elements.sliderElement.addEventListener("mousedown", handleSwipeStart);
    elements.sliderElement.addEventListener("touchstart", handleSwipeStart);
    elements.sliderElement.addEventListener("mouseup", handleSwipeEnd);
    elements.sliderElement.addEventListener("touchend", handleSwipeEnd);

    window.addEventListener("resize", view.updateImageSource);
  };

  const toggleAutoPlay = (start = true) => {
    if (start) {
      autoPlayTimer = setInterval(() => {
        handleSlideChange(1);
      }, config.autoPlayInterval);
    } else {
      clearInterval(autoPlayTimer);
      autoPlayTimer = null;
    }
  };

  const handleSlideChange = (direction) => {
    const { index, isLooping, isReverseLooping } = model.navigateSlide(direction);

    if (isLooping || isReverseLooping) {
      view.updateSlidePosition(index, false);
      setTimeout(() => {
        view.updateSlidePosition(index, true);
      }, 50);
    } else {
      view.updateSlidePosition(index, true);
    }
  };

  const handleSwipeStart = (e) => {
    startX = e.touches ? e.touches[0].clientX : e.clientX;
  };

  const handleSwipeEnd = (e) => {
    const endX = e.changedTouches ? e.changedTouches[0].clientX : e.clientX;
    const deltaX = endX - startX;

    if (Math.abs(deltaX) > config.swipeThreshold) {
      const direction = deltaX > 0 ? -1 : 1;
      handleSlideChange(direction);
    }
  };

  const model = sliderModel(elements.slides.length, toggleAutoPlay);
  const view = sliderView(elements);

  const init = () => {
    attachEvents();
    toggleAutoPlay(true);
  };

  return { init };
};
