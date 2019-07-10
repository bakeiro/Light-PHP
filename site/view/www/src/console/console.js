const error_console = (() => {
  const errors = false;
  const eventTrack = false;
  const dragged = null;

  function activateError() {
    $("button#error-console-button").css("background-color", "#F44336");
    $("div#error-console-top").css("background-color", "#9E9E9E");
  }

  function open(height = "200px") {
    $("div#error-console").css("height", height);
    $("div#error-console-body").css("height", height);
    $("button#error-console-button").text("Close");

    sessionStorage.setItem("console_position", height);
  }

  function close() {
    $("div#error-console").css("height", "30px");
    $("div#error-console-body").css("height", "30px");
    $("button#error-console-button").text("Open");

    sessionStorage.setItem("console_position", "closed");
  }

  function updateHeight() {
    if (this.eventTrack) {
      this.eventTrack = false;
      $("div#error-console-top").css("background-color", "lightgrey");
      $("div#error-console").css("height", this.dragged);
      $("div#error-console-body").css("height", this.dragged);
      sessionStorage.setItem("console_position", this.dragged);
    }
  }

  function trackMouse() {
    if (this.eventTrack) {
      const posY = event.clientY;
      const px_height = (620 - posY) + "px";
      this.dragged = px_height;
    }
  }

  function checkErrors() {
    const childs = $("div#error-console-body").children();
    let errorsFound = false;

    let i = 0;
    while (childs[i]) {
      if (childs[i].className === "warning" || childs[i].className === "error") {
        errorsFound = true;
        break;
      }
      i += 1;
    }

    if (errorsFound) {
      $("button#error-console-button").css("background-color", "#F44336");
    }
  }

  return {
    errors,
    eventTrack,
    dragged,
    activateError,
    open,
    close,
    trackMouse,
    updateHeight,
    checkErrors,
  };

})();


// Button
$("body").on("click", "button#error-console-button", (e) => {
  const text = $("button#error-console-button").text();

  if (text.search("Open") !== -1) {
    error_console.open();
  }
  if (text.search("Close") !== -1) {
    error_console.close();
  }
});

// Move
$("body").on("click", "div#error-console-top", (e) => {
  const text = $("button#error-console-button").text();

  if (text.search("Close") !== -1) {
    $("div#error-console-top").css("background-color", "#ee6e73");
    error_console.eventTrack = true;
  }
});

$("body").on("mouseup", () => {
  error_console.updateHeight();
});

$("body").on("mousemove", () => {
  error_console.trackMouse();
});

// Check errors
$(document).ready(() => {
  error_console.checkErrors();

  if (sessionStorage.getItem("console_position")) {
    if (sessionStorage.getItem("console_position") !== "closed") {
      error_console.open(sessionStorage.getItem("console_position"));
    }
  }
});
