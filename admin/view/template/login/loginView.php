<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link href="http://frame.localhost/site/view/www/fonts/google_icons.css" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

	<br><br>
	<div class="container">

	<?php
		if( Session::get("login_msg") !== null && Session::get("login_msg") !== ""){
			echo "Login incorrect!";
		}
	?>

		<form method="POST" action="index.php?route=login/login/checkLogin">
			<div class="row">
				<div class="col s8 offset-s2">
					<h2 class="header"></h2>
					<div class="card horizontal">
						<div class="card-stacked">
							<div class="card-content">
								<div class="input-field col s10 offset-s1">
									<i class="material-icons prefix">account_circle</i>
									<input name="name" id="name" type="text">
									<label class="active" for="name">Name</label>
								</div>
								<div class="input-field col s10 offset-s1">
									<i class="material-icons prefix">lock</i>
									<input name="pass" id="pass" type="password">
									<label class="active" for="pass">pass</label>
								</div>
							</div>
							<div class="card-action">
								<button class="waves-effect waves-light btn" type="submit">Login</button>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</form>
	</div>
	
</body>
</html>