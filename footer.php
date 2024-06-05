<footer class="footer">
				<!-- <div class="container-fluid">
					<div class="copyright ml-auto">
						<?php echo date('Y');?>, Credit <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.instagram.com/mthminnh/">Muthmainnah</a>
					</div>				
				</div> -->
			</footer>
		</div>
		
		
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add1').DataTable({
				"pageLength": 1,
			});

			// Add Row
			$('#add2').DataTable({
				"pageLength": 2,
			});

			// Add Row
			$('#add3').DataTable({
				"pageLength": 3,
			});

			// Add Row
			$('#add4').DataTable({
				"pageLength": 4,
			});

			// Add Row
			$('#add5').DataTable({
				"pageLength": 5,
			});
		});
	</script>
</body>
</html>