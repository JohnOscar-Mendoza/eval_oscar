 
<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/scroller/1.4.1/js/dataTables.scroller.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
	
	<script>
	$(document).ready(function(){

		$('#accountTable').dataTable( {
			scrollY:        400,
			deferRender:    true,
			scroller:       true
		} );

	})
	

	</script>
</footer>



</body>
</html>