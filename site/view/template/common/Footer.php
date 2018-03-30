		</div>
	</div>

	<!-- Console -->
	<?php
		if(Settings::Get("debug")){

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
			foreach(Errors::$warnings as $warning){
				echo "<p>".$warning."</p>";
			}
			?>
		</div>
	</div>

	<script src="site/view/www/<?=$cache?>/console/console.js"></script>
	<link rel="stylesheet" href="site/view/www/<?=$cache?>/console/console.css">

	<?php
		}
	?>


	<?php

	//Custom CSS/JS
	foreach(Loader::$styles as $style){
		echo $style;
	}
	foreach(Loader::$scripts as $script){
		echo $script;
	}
	?>

	<script>
	
		$(document).ready(function(){
			$("div#login_modal").modal();
		});

		$("body").on("click", "a[name='open_login_modal']", function(){
			$("div#login_modal").modal("open");
		});

	</script>

</body>
</html>