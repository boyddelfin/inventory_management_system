</main>
<!--   Core JS Files   -->
<script src="<?php echo APP_ASSETS; ?>/jquery-3.6.1.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/js/core/popper.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/js/core/bootstrap.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
	var options = {
	damping: '0.5'
	}
	Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<script>
$(document).ready(function () {
    $('table').DataTable();
});
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo APP_ASSETS; ?>/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>