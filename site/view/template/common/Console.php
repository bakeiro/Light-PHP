		
	<?php	
		//Time, memory...
		$memory = Util::convert(memory_get_usage(true));
		
		$end_time = microtime(true);
		$time_script = $end_time - Config::get("start_time");
		$time_script = round($time_script, 4);

		//Cache
		$cache = Config::get("cache_version");

		//Console info
		$stack_messages = Config::get("console_execution_trace");
		$num_messages = count($stack_messages);
	?>

	<div id="error-console">

		<div id="error-console-top"></div>
		<button id="error-console-button">Open </button>
		
		<span id="error-console-script-time"> <i class="material-icons">access_time</i>  <?=$time_script?> </span>
		<span id="error-console-script-memory"> <i class="material-icons">equalizer</i>  <?=$memory?> </span>
		
		<div id="error-console-body">
			<?php			

			foreach($stack_messages as $trace_message){
				if($trace_message["type"] === "error"){
					echo "<p class='error'><i class='material-icons red-text'>error</i>".$trace_message["message"]."</p>";
				}
				if($trace_message["type"] === "warning"){
					echo "<p class='warning'><i class='material-icons lime-text'>warning</i>".$trace_message["message"]."</p>";
				}
				if($trace_message["type"] === "query"){
					echo "<p class='query'><i class='material-icons'>dns</i>".$trace_message["message"]."</p>";
				}
				if($trace_message["type"] === "debug_info"){

					if(gettype($trace_message["message"]) === "array" || gettype($trace_message["message"]) === "object"){
						echo "<pre>";
						print_r($trace_message["message"]);
						echo "</pre>";
					}else{
						echo "<p class='message'>".$trace_message["message"]."</p>";
					}
				}
			}

			?>
		</div>
	</div>

	<script src="site/view/www/build/jquery.min.js"></script>
	<script src="site/view/www/build/console/console.js"></script>
	<link rel="stylesheet" href="site/view/www/build/console/console.css">