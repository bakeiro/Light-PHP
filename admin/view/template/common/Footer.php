</main> <!-- /#main -->


<script>

	//Nav bar
	$(document).ready(function(){
		M.AutoInit();

		var elems = document.querySelectorAll('.sidenav');
		var instances = M.Sidenav.init(elems, {});
			
		NProgress.configure({ easing: 'ease', speed: 800, showSpinner: false });

	});

	//Dynamic loading
	$("#slide-out a:not(.red-text)").on("click", function(e){
		
		NProgress.start();

		e.preventDefault();
		
		let href = $(this).attr("href");

		$("main#main").fadeOut( 200,  function(){
	
			$("main#main").empty();
	
			$("main#main").load(href, function(){
				NProgress.done();
				$("main#main").fadeIn(200);
			});
	
		});

	});

</script>

</body>
</html>