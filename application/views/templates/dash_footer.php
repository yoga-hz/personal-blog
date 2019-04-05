</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <span class="mdi mdi-code-tags" style="font-weight: bold"></span> with <span class="mdi mdi-heart" style="color: indianred"></span> by Yoga Hilmi &copy; 2019
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
<script src="<?= base_url('assets/js/') ?>vendor.min.js"></script>
<script src="<?= base_url('assets/js/') ?>app.min.js"></script>
<script src="<?= base_url('assets/js/vendor/') ?>jquery.dataTables.js"></script>
<script src="<?= base_url('assets/js/vendor/') ?>dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/tinymce/') ?>tinymce.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown()
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass('selected').html(filename);
        });
        $("#table_posts").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
        tinymce.init({
            selector: '#post_main',
            height: 500,
            plugins: 'code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        });
    });
</script>

</body>

</html> 