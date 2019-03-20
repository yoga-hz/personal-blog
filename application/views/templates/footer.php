  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.preloader').fadeOut('slow');
          tinymce.init({
              selector: '#editor_send',
              height: 500,
              plugins: 'code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
              toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
          });
      });
      $('.navbar-burger').click(function() {
          $('.navbar-burger').toggleClass('is-active');
          $('.navbar-menu').toggleClass('is-active');
      });
  </script>
  </body>

  </html> 