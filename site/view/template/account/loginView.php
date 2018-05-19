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