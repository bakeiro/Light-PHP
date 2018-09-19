		</div>
	</div>

	<?php

	//Custom CSS/JS
	foreach(Output::$styles as $style){
		echo $style;
	}
	foreach(Output::$scripts as $script){
		echo $script;
	}
	?>

	<!-- Console -->
	<?php
		if(Config::Get("debug")){
			require(VIEW."template/common/Console.php");
		}
	?>
</body>
</html>