// HIDE MODAL ON NAV LINK CLICK
const navModal = document.querySelector(
  "nav .wp-block-navigation__responsive-container"
);
let navButton = document.querySelectorAll(".wp-block-navigation__container a");
for (i = 0; i < navButton.length; i++) {
  navButton[i].addEventListener("click", function () {
    navModal.classList.remove("is-menu-open");
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
