import { listenToNavbarEvents } from "./nav.js";


const initialize = async () => {
  try {
    listenToNavbarEvents();

  } catch (error) {
    console.error("Error initializing product detail page:", error);
  }
};

document.addEventListener("DOMContentLoaded", initialize);
