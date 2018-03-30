		
	<?php	
		//Time, memory...
		$memory = Util::convert(memory_get_usage(true));
		
		$end_time = microtime(true);
		$time_script = $end_time - Settings::get("start_time");
		$time_script = round($time_script, 4);
	?>

	<div id="error-console">

		<div id="error-console-top"></div>
		<button id="error-console-button" >Open</button>
		
		<span id="error-console-script-time"> <i class="material-icons">access_time</i>  <?=$time_script;?> </span>
		<span id="error-console-script-memory"> <i class="material-icons">dns</i>  <?=$memory;?> </span>
		
		<div id="error-console-body">
			<?php
			foreach(Errors::$exceptions as $exception){
				
				if($exception["type"] === "error"){
					echo "<p><i class='material-icons red-text'>error</i>".$exception["text"]."</p>";
				}
				if($exception["type"] === "warning"){
					echo "<p><i class='material-icons lime-text'>warning</i>".$exception["text"]."</p>";
				}
			}
			?>
		</div>
	</div>

	<script src="site/view/www/<?=$cache?>/console/console.js"></script>
	<link rel="stylesheet" href="site/view/www/<?=$cache?>/console/console.css">