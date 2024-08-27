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
    var tableConfigs = {
        "pageLength": 5,
        "order": [[ 0, "desc" ]] // Jika Anda ingin semua tabel diurutkan descending secara default
    };

    $('#basic-datatables').DataTable();
    $('#multi-filter-select').DataTable({
        ...tableConfigs,
        "pageLength": 5, // Pengaturan spesifik untuk tabel ini
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });

    $('#add1').DataTable({ ...tableConfigs, "pageLength": 1 });
    $('#add2').DataTable({ ...tableConfigs, "pageLength": 2 });
    $('#add3').DataTable({ ...tableConfigs, "pageLength": 3 });
    $('#add4').DataTable({ ...tableConfigs, "pageLength": 4 });
    $('#add5').DataTable({ ...tableConfigs, "pageLength": 5 });
});

	</script>
</body>
</html>