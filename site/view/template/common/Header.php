<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

	<!-- Resources -->
	<?php $cache = Settings::Get("cache_version"); ?>
	<?php $host = Url::$host; ?>

	<!-- my resources -->
	<link href="<?=$host?>/site/view/www/<?=$cache?>/site/site.css" rel="stylesheet">
	
	<!-- Materialize -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<nav>
    <div class="nav-wrapper">
		<a href="index.php?route=index/index" class="brand-logo">site</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="index.php?route=product/product">Products</a></li>
			<li><a href="index.php?route=index/index/about">About</a></li>
			<li><a href="index.php?route=contact/contact">Contact</a></li>
			
			<?php if(Session::get("logged") && Session::get("customer_id")){ ?>
				<li><a href="index.php?route=account/customer">Account</a></li>
			<?php }else{ ?>
				<li><a name="open_login_modal">Login</a></li>
			<?php } ?>
		</ul>
	</div>
</nav>

<!-- Login modal -->
<div id="login_modal" class="modal">
    <div class="modal-content">

		<div class="row">

			<div class="col s6">
    			<h5><i class="material-icons prefix small">account_circle</i>Login</h5>
				<div>
					<div class="row">
						<div class="input-field inline col s12">
							<input name="email" id="email_login" type="email">
							<label class="active" for="email">eMail</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field inline col s12">
							<input name="pass" id="pass" type="password">
							<label class="active" for="pass_login">Password</label>
						</div>
					</div>
					<button class="waves-effect waves-light btn" name="submit_login" type="button">Send!</button>
					
					<script>
						$("body").on("click", "button[name='submit_login']", function(){
							$.ajax({
								url: "index.php?rest=api/customerApi/checkLogin",
								dataType: "json",
								data: $("input[name='pass'], input[name='email']"),
								method: "POST",
								beforeSend: function(){
								},
								complete: function(){
								},
								success: function(json){
									
									var i = 0;
									while(json["errors"][i]){
										if(json["errors"][i]["field"] === "email"){
											$("input#email_login").addClass("invalid");
											alert(json["errors"][i]["msg"]);
										}
										if(json["errors"][i]["field"] === "pass"){
											$("input#pass_login").addClass("invalid");
											alert(json["errors"][i]["msg"]);
										}
										i++;
									}
									
									if(json["success"]){
										window.location.href = "index.php?route=index/index";
									}
								},
								error: function(){
									console.log("something happend!");
								}
							});
						});
					</script>
				</div>
			</div>

			<div class="col s5 offset-s1">
				<h5><i class="material-icons prefix small">contact_mail</i>New Account</h5>
				<br><br>
				<button class="waves-effect waves-light btn blue">Facebook</button><br><br>
				<button class="waves-effect waves-light btn red">Google</button><br><br>
				<button class="waves-effect waves-light btn gray">Email</button><br><br>
			</div>
		</div>
    </div>
</div>

<div class="container">
    <div id="main" class="main">