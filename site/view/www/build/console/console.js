var error_console = (function(){

	var errors = false;
	var event_track = false;
	var dragged;

	function activateError(){
		$("button#error-console-button").css("background-color", "#F44336");
		$("div#error-console-top").css("background-color", "#9E9E9E");
	}

	function open(height = "200px"){
		$("div#error-console").css("height", height);
		$("div#error-console-body").css("height", height);
		$("button#error-console-button").text("Close");

		sessionStorage.setItem("console_position", height);
	}

	function close(){
		$("div#error-console").css("height", "30px");
		$("div#error-console-body").css("height", "30px");
		$("button#error-console-button").text("Open");

		sessionStorage.setItem("console_position", "closed");
	}

	function updateHeight(){
		if(this.event_track){
			this.event_track = false;
			$("div#error-console-top").css("background-color", "lightgrey");
			$("div#error-console").css("height", this.dragged);
			$("div#error-console-body").css("height", this.dragged);

			sessionStorage.setItem("console_position", this.dragged);
		}
	}

	function trackMouse(){
		if(this.event_track){
			var posY = event.clientY;
			var px_height = (620 - posY) + "px";
			this.dragged = px_height;
		}
	}

	function checkErrors(){

		let childs = $("div#error-console-body").children();
		let errors_found = false;

		let i = 0;
		while(childs[i]){
			if(childs[i].className === "warning" || childs[i].className === "error"){
				errors_found = true;
				break;
			}
			i++;
		}

		if(errors_found){
			$("button#error-console-button").css("background-color", "#F44336");
		}
	}

	return{
		errors,
		event_track,
		dragged,
		activateError,
		open,
		close,
		trackMouse,
		updateHeight,
		checkErrors
	};

})();


//Button
$("body").on("click", "button#error-console-button", function(e){

	var text = $("button#error-console-button").text();

	if(text.search("Open") !== -1){
		error_console.open();
	}
	if(text.search("Close") !== -1){
		error_console.close();
	}
});

//Move
$("body").on("click", "div#error-console-top", function(e){

	var text = $("button#error-console-button").text();

	if(text.search("Close") !== -1){
		$("div#error-console-top").css("background-color", "#ee6e73");
		error_console.event_track = true;
	}
});

$("body").on("mouseup", function(e){
	error_console.updateHeight();
});

$("body").on("mousemove", function(e){
	error_console.trackMouse();
});

//Check errors
$(document).ready(function(){
	error_console.checkErrors();

	if(sessionStorage.getItem("console_position")){
		if(sessionStorage.getItem("console_position") !== "closed"){
			error_console.open(sessionStorage.getItem("console_position"));
		}
	}
});