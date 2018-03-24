<h4>Register</h4>

<form method="POST" action="index.php?route=login/login/createAccount">

<div class="row">
	<div class="input-field col s6">
		<i class="material-icons prefix">account_circle</i>
		<input value="" id="first_name" type="text" class="validate">
		<label class="active" for="first_name">First Name</label>
	</div>
	<div class="input-field col s6">
		<input value="" id="last_name" type="text" class="validate">
		<label class="active" for="last_name">Last name</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s12">
		<i class="material-icons prefix">mail</i>
		<input value="" id="mail" type="text" class="validate">
		<label class="active" for="mail">eMail</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s4">
		<i class="material-icons prefix">add_location</i>
		<input value="" id="address_1" type="text" class="validate">
		<label class="active" for="address_1">Address 1</label>
	</div>
	<div class="input-field col s4">
		<input value="" id="postcode" type="text" class="validate">
		<label class="active" for="postcode">Postcode</label>
	</div>
	<div class="input-field col s4">
		<input value="" id="City" type="text" class="validate">
		<label class="active" for="City">City</label>
	</div>
</div>

<button class="waves-effect waves-light btn" type="submit">Create</button>

</form>