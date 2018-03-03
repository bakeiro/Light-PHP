
var event_track = false;
var dragged;

$("body").on("click", "div#error-console-top", function(e){

	var text = $("button#error-console-button").text();

	if(text === "Close"){
		$("div#error-console-top").css("background-color", "#ee6e73");
		event_track = true;
	}
});

$("body").on("click", "button#error-console-button", function(e){

	var text = $("button#error-console-button").text();

	if(text === "Open"){
		$("div#error-console").css("height", "200px");
		$("div#error-console-body").css("height", "200px");
		$("button#error-console-button").text("Close");
	}
	if(text === "Close"){
		$("div#error-console").css("height", "40px");
		$("div#error-console-body").css("height", "40px");
		$("button#error-console-button").text("Open");
	}
});

$("body").on("mouseup", function(e){

	if(event_track){
		event_track = false;
		$("div#error-console-top").css("background-color", "lightgrey");
		$("div#error-console").css("height", dragged);
		$("div#error-console-body").css("height", dragged);
	}
});

$("body").on("mousemove", function(e){
	
	if(event_track){
		var posY = event.clientY;
		var px_height = (620 - posY) + "px";
		dragged = px_height;
	}
});