// POST MODAL
// BIO MODAL FUNCTIONALITY
let bioButton = document.querySelectorAll(".post-modal-link");
const modal = document.querySelector(".modal");
const modalBackdrop = document.querySelector(".modal-backdrop");
const closeModalButton = document.querySelectorAll('.closeModalButton');
let postModalContent = document.querySelectorAll('.post-modal-content');
for (i = 0; i < bioButton.length; i++) {
  bioButton[i].addEventListener('click', function(e) {
    e.preventDefault();
    modal.classList.toggle('show');
    modalBackdrop.classList.toggle('show');
    const buttonId = this.getAttribute('data-id');
    document.querySelector('.post-modal-content[id="' + buttonId + '"').classList.add('show');
  });
}
for (i = 0; i < closeModalButton.length; i++) {
  closeModalButton[i].addEventListener('click', function() {
    modal.classList.remove('show');
    modalBackdrop.classList.remove('show');
    this.parentElement.classList.remove('show');
  });
}

for (i = 0; i < postModalContent.length; i++) {
  postModalContent[i].addEventListener('click', function(e) {
    e.stopPropagation();
  });
  modal.addEventListener('click', function() {
    this.classList.remove('show');
    modalBackdrop.classList.toggle('show');
    if (postModalContent[i].classList.contains('show')) {
      postModalContent[i].classList.remove('show');
    }
  });
}

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
