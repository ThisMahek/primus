<!doctype html>
<html lang="en" class="dark-theme">

<head>
    <?php include_once ('includes/main-head.php') ?>
    <style>
        .imageBox {
            background-image: url('<?= $base64 ?>');
        }
    </style>
</head>

<body>
    <!--sidebar wrapper -->
    <?php include_once ('includes/sidebar.php') ?>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php include_once ('includes/header.php') ?>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h6 class="mb-0 text-uppercase">Upload Your Profile Pic.</h6>
                            </div>
                            <hr>
                            <div class="col-md-5 text-center">
                                <div class="imageBox">
                                    <div class="thumbBox"></div>
                                    <div class="spinner" style="display: none">Loading...</div>
                                </div>
                                <form action="<?= base_url() ?>user/upload_cropped_image" method="post"
                                    enctype="multipart/form-data">
                                    <div class="action">
                                        <input type="file" id="file" onchange="image_validate(this,'btnCrop')"
                                            name="image" class="form-control mb-3 mt-3">

                                        <input class="btn btn-outline-primary" type="button" id="btnCrop" value="Crop"
                                            style="float: right" onclick="showDiv()">
                                        <span class="file_error" style="color: red;"></span>
                                    </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <!-- <form action="<?= base_url() ?>save_user_img" method="post" enctype = "multipart/form-data"> -->
                                <div class="cropped"></div>
                                <input type="hidden" id="croppedImage" name="cropped_image"
                                    class="form-control mb-3 mt-3">
                                <button class="btn btn-outline-secondary mt-3 mr-3" id="btnSave"
                                    style="float: right;display:none;">Save</button>
                                <!-- </form> -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-4 text-uppercase">Add About Us</h6>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-check form-switch text-end">  
                                <input class="form-check-input" type="checkbox"
                                    <?= $user_data->is_about_us == 1 ? 'checked' : "" ?> id="flexSwitchCheckChecked"
                                    onchange="change_status(this,'is_about_us','<?= $about_count ?>')">
                            </div>
                        </div>
                       
                    </div>
                    <hr />
                    <form id="aboutUsForm" method="post" enctype=multipart/form-data>
                        <div class="mt-3">
                            <label for="file" class="mb-2">Add Your Introduction <span class="text-danger">*</span>
                                (Only 100 words Accepted)</label>
                                <!-- <textarea class="summernote" name="introduction">
                               
                                    <?= !empty($aboutus_data->introduction) ? $aboutus_data->introduction : "" ?>
                             
                                </textarea> -->
            
                               
                            <input type="text" name="introduction"  class="form-control"
                                value="<?= !empty($aboutus_data->introduction) ? $aboutus_data->introduction : "" ?>">

                        </div>

                        <div class="mt-3">

                            <label for="file" class="mb-2">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" minlength="10" class="form-control"
                                value="<?= !empty($aboutus_data->designation) ? $aboutus_data->designation : "" ?>">
                        </div>
                        <!-- <div class="mt-3">

                            <label for="file" class="mb-2">Carrier Objective <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="carrier_objective" aria-label="With textarea"
                                style="height: 110px;"><?= !empty($aboutus_data->carrier_objective) ? $aboutus_data->carrier_objective : "" ?></textarea>
                        </div> -->


                        <!-- <div id="editor" required>
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br></p>
                            </div> -->
                        <div class="mt-3">
                            <label for="file" class="mb-2">Upload Your CV/Resume<span class="text-danger">*</span> (Only
                                .pdf Accepted)</label>
                               
                          
                            <input type="file" name="user_cv" id="user_cv" onchange="onlytxtuplodeimg(this)"
                                class="form-control" accept="application/pdf">
                            <span class="user_cv_error" style="color: red;"></span>
                            <br />
                            <?php
                            if (!empty($aboutus_data->cv)) {
                                ?>
                                <a href="<?= base_url() ?><?= $aboutus_data->cv ?>" target="_blank">View Pdf</a>
                            <?php } else { ?>
                                <h6>No PDF Added</h6>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 text-end">
                            <?php
                            if (!empty($aboutus_data)) {
                                ?>
                                <input type="text" hidden name="key" id="key" value="1">
                                <button class="btn btn-outline-secondary mt-4 w-25" id="submitButton"
                                    type="button">Update</button>
                            <?php } else { ?>
                                <input type="text" hidden name="key" id="key" value="2">
                                <button class="btn btn-outline-secondary mt-4 w-25" id="submitButton"
                                    type="button">Save</button>
                            <?php } ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <?php include_once ('includes/footer.php') ?>
   
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
       
      $('.summernote').summernote();
    });
  </script>