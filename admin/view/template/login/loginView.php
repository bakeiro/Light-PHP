
<div class="container">

	<div class="admin_login">
		<form method="POST" action="index.php?route=login/login/checkLogin">

			<!-- Offset is missing to center -->
			<!-- Offset s2 -->
			<div class="row">
				<div class="input-field col s8">
					<i class="material-icons prefix">account_circle</i>
					<input value="" id="name" type="text" class="validate">
					<label class="active" for="name">Name</label>
				</div>

				<div class="input-field col s8">
					<i class="material-icons prefix">account_circle</i>
					<input value="" id="pass" type="password" class="validate">
					<label class="active" for="pass">pass</label>
				</div>
			</div>

			<br>
			<button class="waves-effect waves-light btn" type="submit">Login</button>
		</form>
	</div>

</div>