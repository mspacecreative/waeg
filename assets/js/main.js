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
    modalBackdrop.classList.remove('show');
    htmlTag.classList.remove('fixed');
    this.parentElement.classList.remove('show');
  });
}

if (modal) {
  modal.addEventListener('click', function() {
    this.classList.remove('show');
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

/*
*   This content is licensed according to the W3C Software License at
*   https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
*/

var aria = aria || {};

aria.Utils = aria.Utils || {};

(function () {
  /*
   * When util functions move focus around, set this true so the focus listener
   * can ignore the events.
   */
  aria.Utils.IgnoreUtilFocusChanges = false;

  /**
   * @desc Set focus on descendant nodes until the first focusable element is
   *       found.
   * @param element
   *          DOM node for which to find the first focusable descendant.
   * @returns
   *  true if a focusable element is found and focus is set.
   */
  aria.Utils.focusFirstDescendant = function (element) {
    for (var i = 0; i < element.childNodes.length; i++) {
      var child = element.childNodes[i];
      if (aria.Utils.attemptFocus(child) ||
          aria.Utils.focusFirstDescendant(child)) {
        return true;
      }
    }
    return false;
  }; // end focusFirstDescendant

  /**
   * @desc Find the last descendant node that is focusable.
   * @param element
   *          DOM node for which to find the last focusable descendant.
   * @returns
   *  true if a focusable element is found and focus is set.
   */
  aria.Utils.focusLastDescendant = function (element) {
    for (var i = element.childNodes.length - 1; i >= 0; i--) {
      var child = element.childNodes[i];
      if (aria.Utils.attemptFocus(child) ||
          aria.Utils.focusLastDescendant(child)) {
        return true;
      }
    }
    return false;
  }; // end focusLastDescendant

  /**
   * @desc Set Attempt to set focus on the current node.
   * @param element
   *          The node to attempt to focus on.
   * @returns
   *  true if element is focused.
   */
  aria.Utils.attemptFocus = function (element) {
    if (!aria.Utils.isFocusable(element)) {
      return false;
    }

    aria.Utils.IgnoreUtilFocusChanges = true;
    try {
      element.focus();
    }
    catch (e) {
    }
    aria.Utils.IgnoreUtilFocusChanges = false;
    return (document.activeElement === element);
  }; // end attemptFocus

  /* Modals can open modals. Keep track of them with this array. */
  aria.OpenDialogList = aria.OpenDialogList || new Array(0);

  /**
   * @returns the last opened dialog (the current dialog)
   */
  aria.getCurrentDialog = function () {
    if (aria.OpenDialogList && aria.OpenDialogList.length) {
      return aria.OpenDialogList[aria.OpenDialogList.length - 1];
    }
  };

  aria.closeCurrentDialog = function () {
    var currentDialog = aria.getCurrentDialog();
    if (currentDialog) {
      currentDialog.close();
      return true;
    }

    return false;
  };

  aria.handleEscape = function (event) {
    var key = event.which || event.keyCode;

    if (key === aria.KeyCode.ESC && aria.closeCurrentDialog()) {
      event.stopPropagation();
    }
  };

  document.addEventListener('keyup', aria.handleEscape);

  /**
   * @constructor
   * @desc Dialog object providing modal focus management.
   *
   * Assumptions: The element serving as the dialog container is present in the
   * DOM and hidden. The dialog container has role='dialog'.
   *
   * @param dialogId
   *          The ID of the element serving as the dialog container.
   * @param focusAfterClosed
   *          Either the DOM node or the ID of the DOM node to focus when the
   *          dialog closes.
   * @param focusFirst
   *          Optional parameter containing either the DOM node or the ID of the
   *          DOM node to focus when the dialog opens. If not specified, the
   *          first focusable element in the dialog will receive focus.
   */
  aria.Dialog = function (dialogId, focusAfterClosed, focusFirst) {
    this.dialogNode = document.getElementById(dialogId);

    if (this.dialogNode === null ||
        this.dialogNode.getAttribute('role') !== 'dialog') {
      throw new Error(
        'Dialog() requires a DOM element with ARIA role of dialog.');
    }

    // Wrap in an individual backdrop element if one doesn't exist
    // Native <dialog> elements use the ::backdrop pseudo-element, which
    // works similarly.
    var backdropClass = 'dialog-backdrop';
    if (this.dialogNode.parentNode.classList.contains(backdropClass)) {
      this.backdropNode = this.dialogNode.parentNode;
    }
    else {
      this.backdropNode = document.createElement('div');
      this.backdropNode.className = backdropClass;
      this.dialogNode.parentNode.insertBefore(this.backdropNode, this.dialogNode);
      this.backdropNode.appendChild(this.dialogNode);
    }
    this.backdropNode.classList.add('active');

    if (typeof focusAfterClosed === 'string') {
      this.focusAfterClosed = document.getElementById(focusAfterClosed);
    }
    else if (typeof focusAfterClosed === 'object') {
      this.focusAfterClosed = focusAfterClosed;
    }
    else {
      throw new Error(
        'the focusAfterClosed parameter is required for the aria.Dialog constructor.');
    }

    if (typeof focusFirst === 'string') {
      this.focusFirst = document.getElementById(focusFirst);
    }
    else if (typeof focusFirst === 'object') {
      this.focusFirst = focusFirst;
    }
    else {
      this.focusFirst = null;
    }

    // Bracket the dialog node with two invisible, focusable nodes.
    // While this dialog is open, we use these to make sure that focus never
    // leaves the document even if dialogNode is the first or last node.
    var preDiv = document.createElement('div');
    this.preNode = this.dialogNode.parentNode.insertBefore(preDiv,
      this.dialogNode);
    this.preNode.tabIndex = 0;
    var postDiv = document.createElement('div');
    this.postNode = this.dialogNode.parentNode.insertBefore(postDiv,
      this.dialogNode.nextSibling);
    this.postNode.tabIndex = 0;

    // If this modal is opening on top of one that is already open,
    // get rid of the document focus listener of the open dialog.
    if (aria.OpenDialogList.length > 0) {
      aria.getCurrentDialog().removeListeners();
    }

    this.addListeners();
    aria.OpenDialogList.push(this);
    this.clearDialog();
    this.dialogNode.className = 'default_dialog'; // make visible

    if (this.focusFirst) {
      this.focusFirst.focus();
    }
    else {
      aria.Utils.focusFirstDescendant(this.dialogNode);
    }

    this.lastFocus = document.activeElement;
  }; // end Dialog constructor

  aria.Dialog.prototype.clearDialog = function () {
    Array.prototype.map.call(
      this.dialogNode.querySelectorAll('input'),
      function (input) {
        input.value = '';
      }
    );
  };

  /**
   * @desc
   *  Hides the current top dialog,
   *  removes listeners of the top dialog,
   *  restore listeners of a parent dialog if one was open under the one that just closed,
   *  and sets focus on the element specified for focusAfterClosed.
   */
  aria.Dialog.prototype.close = function () {
    aria.OpenDialogList.pop();
    this.removeListeners();
    aria.Utils.remove(this.preNode);
    aria.Utils.remove(this.postNode);
    this.dialogNode.className = 'hidden';
    this.backdropNode.classList.remove('active');
    this.focusAfterClosed.focus();

    // If a dialog was open underneath this one, restore its listeners.
    if (aria.OpenDialogList.length > 0) {
      aria.getCurrentDialog().addListeners();
    }
  }; // end close

  /**
   * @desc
   *  Hides the current dialog and replaces it with another.
   *
   * @param newDialogId
   *  ID of the dialog that will replace the currently open top dialog.
   * @param newFocusAfterClosed
   *  Optional ID or DOM node specifying where to place focus when the new dialog closes.
   *  If not specified, focus will be placed on the element specified by the dialog being replaced.
   * @param newFocusFirst
   *  Optional ID or DOM node specifying where to place focus in the new dialog when it opens.
   *  If not specified, the first focusable element will receive focus.
   */
  aria.Dialog.prototype.replace = function (newDialogId, newFocusAfterClosed,
    newFocusFirst) {
    var closedDialog = aria.getCurrentDialog();
    aria.OpenDialogList.pop();
    this.removeListeners();
    aria.Utils.remove(this.preNode);
    aria.Utils.remove(this.postNode);
    this.dialogNode.className = 'hidden';
    this.backdropNode.classList.remove('active');

    var focusAfterClosed = newFocusAfterClosed || this.focusAfterClosed;
    var dialog = new aria.Dialog(newDialogId, focusAfterClosed, newFocusFirst);
  }; // end replace

  aria.Dialog.prototype.addListeners = function () {
    document.addEventListener('focus', this.trapFocus, true);
  }; // end addListeners

  aria.Dialog.prototype.removeListeners = function () {
    document.removeEventListener('focus', this.trapFocus, true);
  }; // end removeListeners

  aria.Dialog.prototype.trapFocus = function (event) {
    if (aria.Utils.IgnoreUtilFocusChanges) {
      return;
    }
    var currentDialog = aria.getCurrentDialog();
    if (currentDialog.dialogNode.contains(event.target)) {
      currentDialog.lastFocus = event.target;
    }
    else {
      aria.Utils.focusFirstDescendant(currentDialog.dialogNode);
      if (currentDialog.lastFocus == document.activeElement) {
        aria.Utils.focusLastDescendant(currentDialog.dialogNode);
      }
      currentDialog.lastFocus = document.activeElement;
    }
  }; // end trapFocus

  window.openDialog = function (dialogId, focusAfterClosed, focusFirst) {
    var dialog = new aria.Dialog(dialogId, focusAfterClosed, focusFirst);
  };

  window.closeDialog = function (closeButton) {
    var topDialog = aria.getCurrentDialog();
    if (topDialog.dialogNode.contains(closeButton)) {
      topDialog.close();
    }
  }; // end closeDialog

  window.replaceDialog = function (newDialogId, newFocusAfterClosed,
    newFocusFirst) {
    var topDialog = aria.getCurrentDialog();
    if (topDialog.dialogNode.contains(document.activeElement)) {
      topDialog.replace(newDialogId, newFocusAfterClosed, newFocusFirst);
    }
  }; // end replaceDialog

}());
