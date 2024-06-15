<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2024. All right reserved. <a href="#">primusprofile.com</a></p>
</footer>
</div>

<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="<?= base_url() ?>admin-assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url() ?>admin-assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>admin-assets/js/index.js"></script>
<script src="<?= base_url() ?>admin-assets/js/quill.js"></script>
<script src="<?= base_url() ?>admin-assets/assets/js/custom.js"></script>
<!--app JS-->
<script src="<?= base_url() ?>assets/js/backend.js"></script>
<script src="<?= base_url() ?>admin-assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>



<!--sweetalert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
<?= $this->session->flashdata('error') ?>
<?= $this->session->flashdata('success') ?>


<script>
    new PerfectScrollbar(".app-container")
</script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>