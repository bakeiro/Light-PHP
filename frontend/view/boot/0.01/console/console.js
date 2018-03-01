
var event_track = false;
var dragged;

$("body").on("click", "div#error-console-top", function(e){
	$("div#error-console-top").css("background-color", "#ee6e73");
	event_track = true;
});

$("body").on("mouseup", function(e){
	event_track = false;
	$("div#error-console-top").css("background-color", "lightgrey");
	$("div#error-console").css("height", dragged);
});

$("body").on("mousemove", function(e){
	
	if(event_track){
		var posY = event.clientY;
		var px_height = (620 - posY) + "px";
		dragged = px_height;
	}
});

var template = `
<div id="error-console">
	<div id="error-console-top">
	
	</div>
	<div id="error-console-body">
		
	</div>
</div>`;

$("body").append(template);