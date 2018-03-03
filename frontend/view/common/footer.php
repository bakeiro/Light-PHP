			</div>
		</div>
	</div>

	<!-- Console -->
	<?php
		if(Settings::Get("enviroment") === "developing"){
	?>
	
	<div id="error-console">

		<div id="error-console-top"></div>
		<button id="error-console-button" >Close</button>
		<div id="error-console-body">
			<?php
			foreach(Errors::$warnings as $warning){
				echo "<p>".$warning."</p>";
			}
			?>
		</div>
	</div>
	
	<script src="frontend/view/boot/<?=$cache?>/console/console.js"></script>
	<link rel="stylesheet" href="frontend/view/boot/<?=$cache?>/console/console.css"> 

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

</body>
</html>