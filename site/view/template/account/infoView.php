<h1>Customer info!</h1>

<p>Account id: </p>
<?=Session::get("customer_id")?>

<br><br>
<a href="index.php?route=account/customer/logout" class="waves-effect waves-light btn red">Log out</a>