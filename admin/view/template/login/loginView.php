<br><br>
<div class="container">

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