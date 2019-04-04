<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<?php $host = Config::get("url_host;"); ?>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>

	<br><br>
	<div class="container">

		<form method="POST" action="index.php?route=login/login/checkLogin">
			<div class="row">

				<?php
					if(Session::get("login_msg")){

						$alert_html = '
						<div class="col s8 offset-s2">
							<div class="card horizontal yellow lighten-2 black-text">
								<div class="card-stacked">
									<div class="card-content">
										<p>'.Session::get("login_msg").'</p>
									</div>
								</div>
							</div>
						</div>';
						echo $alert_html;
						Session::set("login_msg", null);
					}
				?>

				<div class="col s8 offset-s2">
					<h2 class="header"></h2>
					<div class="card horizontal">
						<div class="card-stacked">
							<div class="card-content">

								<p>admin@email.com</p>
								<p>123</p>

								<div class="input-field col s10 offset-s1">
									<i class="material-icons prefix">account_circle</i>
									<input name="email" id="email" type="text">
									<label class="active" for="email">email</label>
									{{csrf_input}}
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