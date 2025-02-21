const setupNav = () => {
  const config = {
    navbar: {
      body: ".nav",
      button: ".nav__button-bar",
      close: ".nav__button-close",
    },
    search: {
      body: ".header__search",
      button: ".header__action-button-open",
      close: ".header__search-button-close",
    },
    dropdown: ".dropdown",
  };

  const elements = {
    navbarBody: document.querySelector(config.navbar.body),
    navbarButton: document.querySelector(config.navbar.button),
    navbarClose: document.querySelector(config.navbar.close),
    searchBody: document.querySelector(config.search.body),
    searchButton: document.querySelector(config.search.button),
    searchClose: document.querySelector(config.search.close),
    dropdownToggles: document.querySelectorAll(config.dropdown),
  };

  return elements;
};

// Functions
const toggleState = (element, toggleClass, expanded = null) => {
  const isExpanded = expanded !== null ? expanded : element.getAttribute("aria-expanded");
  element.setAttribute("aria-expanded", expanded !== null ? expanded : !isExpanded);

  if (expanded === false) {
    element.classList.remove(toggleClass);
  } else if (expanded == true) {
    element.classList.add(toggleClass);
  } else {
    element.classList.toggle(toggleClass);
  }
};

const handleToggle = (element, bodyClass, toggleClass) => {
  if (element) {
    const isOpen = element.classList.contains(toggleClass);
    document.body.classList.toggle(bodyClass, !isOpen);
    toggleState(element, toggleClass);
  } else {
    console.warm(`handleToggle failed: Target element is ${element}.
                    Ensure the element exists and is correctly selected before toggling '${toggleClass}'.`);
  }
};

const handleClose = (element, bodyClass, closeClass) => {
  if (element) {
    document.body.classList.remove(bodyClass);
    element.classList.remove(closeClass);
    element.setAttribute("aria-expanded", "false");
  } else {
    console.warn(
      `handleClose failed: Target element is ${element}. 
        Ensure the element exists and is correctly selected before removing '${closeClass}'.`
    );
  }
};

const toggleNavbar = (navbarConfig) => {
  const { navbarBody, searchBody } = navbarConfig;

  if (searchBody.getAttribute("aria-expanded") === "true") closeSearch(navbarConfig);

  handleToggle(navbarBody, "navbar-open", "show");
};

const closeNavbar = (navbarConfig) => {
  const { navbarBody } = navbarConfig;
  handleClose(navbarBody, "navbar-open", "show");
};

const toggleSearch = (navbarConfig) => {
  const { navbarBody, searchBody } = navbarConfig;

  if (navbarBody.getAttribute("aria-expanded") === "true") closeNavbar(navbarConfig);

  handleToggle(searchBody, "search-open", "show");
};

const closeSearch = (navbarConfig) => {
  const { searchBody } = navbarConfig;
  handleClose(searchBody, "search-open", "show");
};

const toggleDropdown = (toggle) => {
  if (!toggle) {
    console.warn("toggleDropdown failed: The 'dropdownToggle' element is missing. Make sure the correct element is passed.");
    return;
  }

  const dropdownMenu = toggle.nextElementSibling;
  if (!dropdownMenu) {
    console.warn(
      `toggleDropdown failed: No sibling element found for the dropdown menu. 
        Ensure 'dropdownToggle' has a valid sibling that serves as the dropdown menu.`
    );
    return;
  }

  const isExpanded = toggle.getAttribute("aria-expanded") === "true";
  toggle.setAttribute("aria-expanded", !isExpanded);
  dropdownMenu.classList.toggle("active", !isExpanded);
};

const closeAllDropdowns = (navbarConfig) => {
  const { dropdownToggles } = navbarConfig;

  dropdownToggles.forEach((toggle) => {
    toggle.setAttribute("aria-expanded", "false");
    const menu = toggle.nextElementSibling;
    if (menu) menu.classList.remove("active");
  });
};


export const listenToNavbarEvents = () => {
  const navbarConfig = setupNav();

  const { navbarBody, searchBody, navbarButton, navbarClose, searchButton, searchClose, dropdownToggles } = navbarConfig;

  const addEventListenerSafe = (element, event, handler) => {
    if (element) {
      element.addEventListener(event, handler);
    } else {
      console.warn(
        `Cannot add '${event}' event: The target element is ${element}. 
           Make sure you passed the correct DOM element.`
      );
    }
  };

  addEventListenerSafe(navbarButton, "click", (e) => {
    e.stopPropagation();
    toggleNavbar(navbarConfig);
  });

  addEventListenerSafe(navbarClose, "click", (e) => {
    e.stopPropagation();
    closeNavbar(navbarConfig);
  });

  addEventListenerSafe(searchButton, "click", (e) => {
    e.stopPropagation();
    toggleSearch(navbarConfig);
  });

  addEventListenerSafe(searchClose, "click", (e) => {
    e.stopPropagation();
    toggleSearch(navbarConfig);
  });

  dropdownToggles.forEach((toggle) => {
    addEventListenerSafe(toggle, "click", (e) => {
      e.stopPropagation();
      toggleDropdown(toggle);
    });
  });

  document.addEventListener("click", (e) => {
    if (!e.target.closest(".nav") && !e.target.closest(".nav__button-bar")) closeNavbar(navbarConfig);
    if (!e.target.closest(".header__search") && !e.target.closest(".header__action-button-open")) closeSearch(navbarConfig);
    if (!e.target.closest(".dropdown")) closeAllDropdowns(navbarConfig);
  });
};
