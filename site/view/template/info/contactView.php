<h3>Contact page</h3>

<p>Here you will send and email to the email configured</p>

<form method="POST" action="index.php?route=index/index/contactSend">

	<div class="row">
		<div class="input-field col s5">
			<i class="material-icons prefix">account_circle</i>
			<input id="first_name" type="text" class="validate" name="first_name">
			<label class="active" for="first_name">First Name</label>
		</div>
		<div class="input-field col s5">
			<input id="last_name" type="text" class="validate" name="last_name">
			<label class="active" for="last_name">Last name</label>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s10">
			<i class="material-icons prefix">mail</i>
			<input id="mail" type="text" name="email_target" class="validate">
			<label class="active" for="mail">eMail</label>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s10">
			<i class="material-icons prefix">mode_edit</i>
			<textarea id="textarea1" class="materialize-textarea" name="text"></textarea>
			<label for="textarea1">Textarea</label>
		</div>
	</div>

	<button class="waves-effect waves-light btn" type="submit">Send!<i class="material-icons right">send</i></button>

</form>