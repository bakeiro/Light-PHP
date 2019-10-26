class ErrorConsole {
  constructor() {
    this.errors = false;
    this.event_track = false;
    this.dragged = null;
    this.div_error_console = window.document.querySelector("div#error-console");
    this.error_console_top = window.document.querySelector("div#error-console-top");
    this.error_console_buttons = window.document.querySelectorAll("button#error-console-button");
    this.error_console_body = window.document.querySelector("div#error-console-body-debug");
    //this.error_console_body_2 = window.document.querySelector("div#error-console-body");
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
    sessionStorage.setItem("console_position", height);
  }

  close() {
    this.div_error_console.style.height = "35px";
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
      this.error_console_buttons.forEach((elem) => {
        elem.style.backgroundColor = "#F44336";
      });
    }
  }
}

window.debug_console = new ErrorConsole();

$("body").on("click", "button#error-console-button", () => {
  debugger;
  if (sessionStorage.getItem("console_position") !== "closed") {
    window.debug_console.close();
  } else {
    window.debug_console.open();
  }
});

// Check errors
$(document).ready(() => {
  window.debug_console.checkErrors();
  // Height
  if (sessionStorage.getItem("console_position")) {
    if (sessionStorage.getItem("console_position") !== "closed") {
      window.debug_console.open(sessionStorage.getItem("console_position"));
    }
  }
});
