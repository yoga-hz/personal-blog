</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <span class="mdi mdi-code-braces" style="font-weight: bold"></span> with <span class="mdi mdi-heart" style="color: indianred"></span> by Yoga Hilmi &copy; 2019
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->
<!-- App js -->
<script src="<?= base_url('assets/') ?>js/vendor.min.js"></script>
<script src="<?= base_url('assets/') ?>js/app.min.js"></script>
<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(filename);
    });
</script>

</body>

</html> 