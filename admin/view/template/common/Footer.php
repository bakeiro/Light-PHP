</main> <!-- /#main -->


<script>

	$(document).ready(function(){
		M.AutoInit();

		var elems = document.querySelectorAll('.sidenav');
    	var instances = M.Sidenav.init(elems, {});
	});


	$("#slide-out a").on("click", function(e){
		
		e.preventDefault();

		//start nprogress

		$("main#main").empty();

		$("main#main").load($(this).attr("href"));
	});

</script>

</body>
</html>