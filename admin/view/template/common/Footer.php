</main> <!-- /#main -->


<script>

	//Nav bar
	$(document).ready(function(){
		M.AutoInit();

		var elems = document.querySelectorAll('.sidenav');
    	var instances = M.Sidenav.init(elems, {});
	});

	//Dynamic loading
	$("#slide-out a:not(.red-text)").on("click", function(e){
		
		e.preventDefault();

		//start nprogress

		$("main#main").empty();

		$("main#main").load($(this).attr("href"));
	});

</script>

</body>
</html>