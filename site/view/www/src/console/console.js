class ErrorConsole {
  constructor() {
    this.errors = false;
    this.event_track = false;
    this.dragged = null;
    this.opened = false;
    this.div_error_console = window.document.querySelector("div#error-console");
    this.error_console_top = window.document.querySelector("div#error-console-top");
    this.error_console_buttons = window.document.querySelectorAll("button#error-console-button");
    this.error_console_body = window.document.querySelector("div#error-console-body-debug");
  }

  activateError() {
    this.error_console_buttons.forEach((elem) => {
      elem.style.backgroundColor = "#F44336";
      elem.style.border = "2px solid red";
    });

    const div_console = this.error_console_top[0];
    div_console.style.backgroundColor = "#9E9E9E";
  }

  open(height = "200px") {
    this.div_error_console.style.height = height;
    window.document.querySelector("div#error-console-body").style.height = height;
    sessionStorage.setItem("console_position", height);
  }

  close() {
    this.div_error_console.style.height = "30px";
    window.document.querySelector("div#error-console-body").style.height = "30px";
    sessionStorage.setItem("console_position", "closed");
  }


  checkErrors() {
    const childs = this.error_console_body.children;
    let errors_found = false;

    let i = 0;
    while (childs[i]) {
      if (childs[i].className === "warning" || childs[i].className === "error") {
        errors_found = true;
        break;
      }
      i += 1;
    }

    if (errors_found) {
      $("button#error-console-button").css("background-color", "#F44336");
    }
  }
}

const error_console = new ErrorConsole();

$("body").on("click", "button#error-console-button", (e) => {
  if (this.opened) {
    error_console.open();
  } else {
    error_console.close();
  }
});

// Move
$("body").on("click", "div#error-console-top", (e) => {
  const text = $("button#error-console-button").text();

  if (text.search("Close") !== -1) {
    $("div#error-console-top").css("background-color", "#ee6e73");
    error_console.event_track = true;
  }
});


// Check errors
$(document).ready(() => {
  error_console.checkErrors();
  // Height
  if (sessionStorage.getItem("console_position")) {
    if (sessionStorage.getItem("console_position") !== "closed") {
      error_console.open(sessionStorage.getItem("console_position"));
    }
  }
});
