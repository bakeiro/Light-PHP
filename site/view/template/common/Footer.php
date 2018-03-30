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