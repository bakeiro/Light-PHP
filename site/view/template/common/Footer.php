		</div>
	</div>

	<?php

	//Custom CSS/JS
	foreach(Loader::$styles as $style){
		echo $style;
	}
	foreach(Loader::$scripts as $script){
		echo $script;
	}
	?>

	<!-- Console -->
	<?php
		if(Settings::Get("debug")){
			require(VIEW."template/common/Console.php");
		}
	?>
</body>
</html>