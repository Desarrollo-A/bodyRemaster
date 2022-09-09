<script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/chartjs.min.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?=base_url()?>assets/js/material-dashboard.min.js?v=3.0.4"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
        damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
