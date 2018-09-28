		
	<?php	
		//Time, memory...
		$memory = Util::convert(memory_get_usage(true));
		
		$end_time = microtime(true);
		$time_script = $end_time - Config::get("start_time");
		$time_script = round($time_script, 4);

		//Cache
		$cache = Config::get("cache_version");
	?>

	<div id="error-console">

		<div id="error-console-top"></div>
		<button id="error-console-button" >Open</button>
		
		<span id="error-console-script-time"> <i class="material-icons">access_time</i>  <?=$time_script?> </span>
		<span id="error-console-script-memory"> <i class="material-icons">dns</i>  <?=$memory?> </span>
		
		<div id="error-console-body">
			<?php
			foreach(Errors::$exceptions as $exception){
				
				if($exception["type"] === "Fatal Error" || $exception["type"] === "Unknown"){
					echo "<p><i class='material-icons red-text'>error</i>".$exception["text"]."</p>";
				}
				if($exception["type"] === "Warning" || $exception["type"] ===  "Notice"){
					echo "<p><i class='material-icons lime-text'>warning</i>".$exception["text"]."</p>";
				}
			}
			foreach(Config::get("console_messages") as $message){
				echo "<p>".$message."</p>";
			}
			?>
		</div>
	</div>

	<script src="site/view/www/build/<?=$cache?>/console/console.js"></script>
	<link rel="stylesheet" href="site/view/www/build/<?=$cache?>/console/console.css">