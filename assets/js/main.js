// AUDIO TRIGGER
let audioTrigger = document.querySelectorAll(".audio-trigger");
const audioFile = document.querySelectorAll("audio");
let num = 0;
for (i = 0; i < audioFile.length; i++) {
  audioFile[i].setAttribute("id", "audio-" + num++);
}
for (i = 0; i < audioTrigger.length; i++) {
  audioTrigger[i].addEventListener("click", (e) => {
    e.preventDefault();
    audioFile.play();
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

window.addEventListener("resize", () => {
  if (!document.body.classList.contains("home")) {
    mainTag.style.marginTop = headerHeight.clientHeight + "px";
  }
});

function fadeInPage() {
  document.body.classList.remove("fade-out");
  document.body.classList.add("fade-in");
}

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
