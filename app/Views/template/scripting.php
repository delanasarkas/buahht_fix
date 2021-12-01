<!-- Vendor JS Files -->
<script src="/assets/dashboard/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/dashboard/vendor/chart.js/chart.min.js"></script>
<script src="/assets/dashboard/vendor/echarts/echarts.min.js"></script>
<script src="/assets/dashboard/vendor/quill/quill.min.js"></script>
<script src="/assets/dashboard/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/dashboard/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/dashboard/vendor/php-email-form/validate.js"></script>
<script src="/assets/dashboard/vendor/jquery/jquery.min.js"></script>

<!-- Template Main JS File -->
<script src="/assets/dashboard/js/main.js"></script>

<!-- TOASTR -->
<script src="/assets/dashboard/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    <?php if(session()->get('success')){ ?>
        toastr.success("<?= session()->get('success'); ?>");
    <?php }else if(session()->get('error')){  ?>
        toastr.error("<?= session()->get('error'); ?>");
    <?php }else if(session()->get('warning')){  ?>
        toastr.warning("<?= session()->get('warning'); ?>");
    <?php }else if(session()->get('info')){  ?>
        toastr.info("<?= session()->get('info'); ?>");
    <?php } ?>
</script>
