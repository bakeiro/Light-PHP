function makeResizableDiv(div_selector, top_div_selector) {
  let original_mouse_y = 0;
  const element = document.querySelector(div_selector);
  const resizer = document.querySelector(top_div_selector);
  let original_height = parseFloat(getComputedStyle(element, null).getPropertyValue("height").replace("px", ""));

  function resize(e) {
    if (resizer.id === "error-console-top") {
      const updated_height = original_height - (e.pageY - original_mouse_y);
      if (updated_height > 30 && updated_height < 600) {
        element.style.height = `${updated_height}px`;
        sessionStorage.setItem("console_position", `${updated_height}px`);
      }
    }
  }

  function stopResize() {
    window.removeEventListener("mousemove", resize);
  }

  resizer.addEventListener("mousedown", (e) => {
    original_height = document.querySelector(div_selector).clientHeight;
    original_mouse_y = e.pageY;
    e.preventDefault();
    window.addEventListener("mousemove", resize);
    window.addEventListener("mouseup", stopResize);
  });
}

makeResizableDiv("div#console-div", "div#error-console-top");

const buttons = document.querySelectorAll("button.enable");
buttons.forEach((value) => {
  value.addEventListener("click", (event) => {
    // Remove active div
    const console_bodies = document.querySelectorAll("div.console-body-seccion");
    console_bodies.forEach((console_body) => {
      console_body.classList.remove("active");
    });

    // Remove active buttons
    const console_buttons = document.querySelectorAll("button.btn-console");
    console_buttons.forEach((console_button) => {
      console_button.classList.remove("active");
    });

    // Add active div
    let id_div_to_enable = event.srcElement.className;
    id_div_to_enable = id_div_to_enable.split(/ /)[2];
    document.getElementById(id_div_to_enable).className += " active";

    // Add active button
    // event.srcElement.className += " active";
    const src_element = event.srcElement;
    src_element.className += " active";
  });
});

// DOM loaded
if (sessionStorage.getItem("console_position")) {
  document.querySelector("div#console-div").style.height = sessionStorage.getItem("console_position");
  document.querySelector("body").style.paddingBottom = "30px";
}
