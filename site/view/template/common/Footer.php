		</div>
	</div>

	<?php

	//Custom CSS/JS
	foreach(Config::get("output_styles") as $style_file){
		echo $style_file;
	}
	foreach(Config::get("output_scripts") as $script_file){
		echo $script_file;
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