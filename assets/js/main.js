// TRAP FOCUS IN MODAL
const trapFocus = (element, prevFocusableElement = document.activeElement) => {
  const focusableEls = Array.from(
    element.querySelectorAll(
      'a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'
    )
  );
  const firstFocusableEl = focusableEls[0];
  const lastFocusableEl = focusableEls[focusableEls.length - 1];
  let currentFocus = null;

  firstFocusableEl.focus();
  currentFocus = firstFocusableEl;

  const handleFocus = e => {
    e.preventDefault();
    // if the focused element "lives" in your modal container then just focus it
    if (focusableEls.includes(e.target)) {
      currentFocus = e.target;
    } else {
      // you're out of the container
      // if previously the focused element was the first element then focus the last 
      // element - means you were using the shift key
      if (currentFocus === firstFocusableEl) {
        lastFocusableEl.focus();
      } else {
        // you previously were focused on the last element so just focus the first one
        firstFocusableEl.focus();
      }
      // update the current focus var
      currentFocus = document.activeElement;
    }
  };

  document.addEventListener("focus", handleFocus, true);

  return {
    onClose: () => {
      document.removeEventListener("focus", handleFocus, true);
      prevFocusableElement.focus();
    }
  };
};

// REMOVE EXTRA SEMICOLON FROM STRING
const botanicalNames = document.querySelectorAll('.modal .botanical-names h2');
for (i=0; i < botanicalNames.length; i++) {
  botanicalNames[i].innerHTML = botanicalNames[i].innerHTML.substring(0,botanicalNames[i].innerHTML.length-1);
}

// SLIDE TOGGLE

let slideUp = (target, duration=500) => {
  target.style.transitionProperty = 'height, margin, padding';
  target.style.transitionDuration = duration + 'ms';
  target.style.boxSizing = 'border-box';
  target.style.height = target.offsetHeight + 'px';
  target.offsetHeight;
  target.style.overflow = 'hidden';
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout( () => {
    target.style.display = 'none';
    target.style.removeProperty('height');
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    target.style.removeProperty('overflow');
    target.style.removeProperty('transition-duration');
    target.style.removeProperty('transition-property');
  }, duration);
}

let slideDown = (target, duration=500) => {
  target.style.removeProperty('display');
  let display = window.getComputedStyle(target).display;

  if (display === 'none')
    display = 'block';

  target.style.display = display;
  let height = target.offsetHeight;
  target.style.overflow = 'hidden';
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = 'border-box';
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + 'ms';
  target.style.height = height + 'px';
  target.style.removeProperty('padding-top');
  target.style.removeProperty('padding-bottom');
  target.style.removeProperty('margin-top');
  target.style.removeProperty('margin-bottom');
  window.setTimeout( () => {
    target.style.removeProperty('height');
    target.style.removeProperty('overflow');
    target.style.removeProperty('transition-duration');
    target.style.removeProperty('transition-property');
  }, duration);
}
var slideToggle = (target, duration = 500) => {
  if (window.getComputedStyle(target).display === 'none') {
    return slideDown(target, duration);
  } else {
    return slideUp(target, duration);
  }
}

// VIRTUAL TOUR NAVIGATION
const navToggle = document.querySelector('.virtual-tour-navigation__toggle');
const virtualTourNav = document.querySelector('nav.virtual-tour__navigation');

if (navToggle) {
  navToggle.addEventListener('click', function() {
    // virtualTourNav.classList.toggle('show');
    slideToggle(virtualTourNav, 200);
    if (this.innerHTML === "NAVIGATION") {
      this.innerHTML="CLOSE";
    } else {
      this.innerHTML="NAVIGATION";
    }
  });
}

// POST MODAL
// BIO MODAL FUNCTIONALITY
let bioButton = document.querySelectorAll(".post-modal-link");
const modal = document.querySelector(".modal");
const modalBackdrop = document.querySelector(".modal-backdrop");
const closeModalButton = document.querySelectorAll('.closeModalButton');
const htmlTag = document.querySelector('html');
let postModalContent = document.querySelectorAll('.post-modal-content');
for (i = 0; i < bioButton.length; i++) {
  bioButton[i].addEventListener('click', function(e) {
    e.preventDefault();
    toggleModal();
    modal.classList.toggle('show');
    modal.focus();
    htmlTag.classList.add('fixed');
    modalBackdrop.classList.toggle('show');
    const buttonId = this.getAttribute('data-id');
    document.querySelector('.post-modal-content[id="' + buttonId + '"').classList.add('show');
  });
}

for (i = 0; i < closeModalButton.length; i++) {
  closeModalButton[i].addEventListener('click', function() {
    modal.classList.remove('show');
    toggleModal();
    modalBackdrop.classList.remove('show');
    htmlTag.classList.remove('fixed');
    this.parentElement.classList.remove('show');
  });
}

if (modal) {
  modal.addEventListener('click', function() {
    this.classList.remove('show');
    toggleModal();
    modalBackdrop.classList.toggle('show');
    htmlTag.classList.remove('fixed');
    for (i = 0; i < postModalContent.length; i++) {
      if (postModalContent[i].classList.contains('show')) {
        postModalContent[i].classList.remove('show');
      }
    } 
  });
}

for (i = 0; i < postModalContent.length; i++) {
  postModalContent[i].addEventListener('click', function(e) {
    e.stopPropagation();
  });
}

// ESCAPE BUTTON CLICK TO CLOSE MODAL
document.addEventListener('keydown', (event) => {
        
  if (event.key === 'Escape') {
   //if esc key was not pressed in combination with ctrl or alt or shift
      const isNotCombinedKey = !(event.ctrlKey || event.altKey || event.shiftKey);
      if (isNotCombinedKey) {
        modal.classList.remove('show');
        toggleModal();
        modalBackdrop.classList.remove('show');
        htmlTag.classList.remove('fixed');
        for (i = 0; i < postModalContent.length; i++) {
          if (postModalContent[i].classList.contains('show')) {
            postModalContent[i].classList.remove('show');
          }
        }
      }
  }
});


// JQUERY Version
// $(this).click(function (e) {
//   e.preventDefault();
//   $(modal).toggleClass("show");
//   $(modalBackdrop).toggleClass("show");
//   const buttonId = $(this).data("id");
//   $('.bio-container[id="' + buttonId + '"').addClass("show");
// });

// AUDIO TRIGGER
let audioTrigger = document.querySelectorAll(".audio-trigger");
const audioFile = document.querySelectorAll("audio");
let num = 1;
for (i = 0; i < audioFile.length; i++) {
  audioFile[i].setAttribute("id", "audio-" + num++);
}
let triggerNum = 1;
for (i = 0; i < audioTrigger.length; i++) {
  audioTrigger[i].setAttribute("data-id", "audio-" + triggerNum++);
  const audio = audioTrigger[i].nextElementSibling;
  audioTrigger[i].addEventListener("click", () => {
    // e.preventDefault();
    audio.play();
  });
}

// DYNAMIC TOP MARGIN ON MAIN TAG
const mainTag = document.querySelector("main");
const headerHeight = document.querySelector("header");
const homePage = document.querySelector(".home");

document.addEventListener("DOMContentLoaded", () => {
  if (!document.body.classList.contains("home")) {
    mainTag.style.marginTop = headerHeight.clientHeight + "px";
  }
});

// window.addEventListener("orientationchange load resize", () => {
//   mainTag.style.marginTop = headerHeight.clientHeight + "px";
// });

const mediaQuery = window.matchMedia('(min-width: 1150px)');

// Register event listener
mediaQuery.addEventListener("change", handleTabletChange);

function handleTabletChange(e) {
  if (navToggle) {
    if (e.matches) {
      virtualTourNav.style.display = 'block';
    } else {
      virtualTourNav.style.display = 'none';
    }
  }
}

handleTabletChange(mediaQuery);

window.addEventListener("resize", () => {
  if (!document.body.classList.contains("home")) {
    mainTag.style.marginTop = headerHeight.clientHeight + "px";
  }
  if (navToggle && navToggle.innerHTML === "CLOSE") {
    virtualTourNav.style.display = 'block';
  }
});

function fadeInPage() {
  document.body.classList.remove("fade-out");
  document.body.classList.add("fade-in");
}

// if (mediaQuery.matches) {
//   virtualTourNav.style.display = 'block';
// }

window.onload = () => {
  setTimeout(fadeInPage, 500);
};

// HIDE MODAL ON NAV LINK CLICK
const navModal = document.querySelector(
  "nav .wp-block-navigation__responsive-container"
);
let navButton = document.querySelectorAll(".wp-block-navigation__container a");
for (i = 0; i < navButton.length; i++) {
  navButton[i].addEventListener("click", function () {
    navModal.classList.remove("is-menu-open");

    // PAGE FADE TRANSITION
    document.body.classList.add("fade-out");
  });
}

// FIXED HEADER TOGGLE
var lastScrollTop = 0;
const header = document.querySelector("header");

window.addEventListener(
  "scroll",
  function () {
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
      header.classList.add("scroll-down");
      header.classList.remove("fixed", "scroll-up", "reset");
    } else if (st < lastScrollTop) {
      header.classList.add("fixed", "scroll-up");
      header.classList.remove("scroll-down");
      if (window.pageYOffset == 20) {
        header.classList.add("reset");
      }
    } // else was horizontal scroll
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  },
  false
);

window.onscroll = function () {
  if (window.pageYOffset <= 150) {
    header.classList.add("reset");
  }
};

const toggleModal = ((e) => {
  if (modal.classList.contains('show')) {
    trapped = trapFocus(modal);
  } else {
    trapped.onClose();
  } 
});