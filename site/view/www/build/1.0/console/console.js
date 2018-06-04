var error_console = (function(){

	var errors = false;
	var event_track = false;
	var dragged;

	function activateError(){
		$("button#error-console-button").css("background-color", "#F44336");
		$("div#error-console-top").css("background-color", "#9E9E9E");
	}

	function open(){
		$("div#error-console").css("height", "200px");
		$("div#error-console-body").css("height", "200px");
		$("button#error-console-button").text("Close");
	}

	function close(){
		$("div#error-console").css("height", "30px");
		$("div#error-console-body").css("height", "30px");
		$("button#error-console-button").text("Open");
	}

	function updateHeight(){
		if(this.event_track){
			this.event_track = false;
			$("div#error-console-top").css("background-color", "lightgrey");
			$("div#error-console").css("height", this.dragged);
			$("div#error-console-body").css("height", this.dragged);
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
		var childs = $("div#error-console-body").children();

		if(childs.length > 0){
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

	if(text === "Open"){
		error_console.open();
	}
	if(text === "Close"){
		error_console.close();
	}
});

//Move
$("body").on("click", "div#error-console-top", function(e){

	var text = $("button#error-console-button").text();

	if(text === "Close"){
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
});