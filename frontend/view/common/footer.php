			</div>
		</div>
	</div>

<?php
	if(Settings::Get("enviroment") === "developing"){
?>
<script src="frontend/view/boot/<?=$cache?>/console/console.js"></script>
<link rel="stylesheet" href="frontend/view/boot/<?=$cache?>/console/console.css"> 
<?php
	}
?>

<?php
foreach(Loader::$styles as $style){
    echo $style;
}
foreach(Loader::$scripts as $script){
    echo $script;
}
?>

</body>
</html>