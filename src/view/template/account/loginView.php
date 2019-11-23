<div class="row">

	<div class="col s6">
    	<h5><i class="material-icons prefix small">account_circle</i>Login</h5>

		<p>customer@email.com</p>
		<p>321</p>

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
						url: "index.php?route=account/customer/checkLogin",
						dataType: "json",
						data: $("input"),
						method: "POST",
						beforeSend: function(){
						},
						complete: function(){
						},
						success: function(json){

							if(json["error"]){
								$("input#email_login").addClass("invalid");
								alert(json["error"]);
							}
							if(json["success"]){
								window.location.href = "index.php?route=index/index";
							}
						},
						error: function(xhr, ajaxOptions, thrownError){
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
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
