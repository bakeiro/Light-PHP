<h1>Products</h1>

<p>Here you can see all the products avaliable in the shop</p>

<?php
foreach($products as $prod){
	echo $prod['model']."<br>";
}