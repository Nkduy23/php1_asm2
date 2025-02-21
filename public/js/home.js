import { listenToNavbarEvents } from "./nav.js";
import { sliderController } from "./slider.js";
import { DEFAULT_SALE_END_TIME, SALE_ENDED_MESSAGE } from "./time-sale.js";
import { CountdownController } from "./countdown.js";


const initialize = async () => {
  try {
    listenToNavbarEvents();

    const slider = sliderController();
    slider.init();

    const countdownCtrl = new CountdownController(DEFAULT_SALE_END_TIME, SALE_ENDED_MESSAGE);
    countdownCtrl.start();

  } catch (error) {
    console.error("Error initializing product detail page:", error);
  }
};

document.addEventListener("DOMContentLoaded", initialize);
