		</div>
	</div>

	<!-- Console -->
	<?php
		if(Settings::Get("debug")){
	?>

	<div id="error-console">

		<div id="error-console-top"></div>
		<button id="error-console-button" >Open</button>
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