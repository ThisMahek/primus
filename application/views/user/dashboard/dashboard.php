<!doctype html>
<html lang="en" class="dark-theme">
    <head>
        <?php include_once('includes/main-head.php') ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    </head>
    <body>
        <!--sidebar wrapper -->
        <?php include_once('includes/sidebar.php') ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include_once('includes/header.php') ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    
                <div class="col-md-4">
                    <div class="wrapper-box">
                        <div class="card bdr-white">
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h6 class="mb-0 text-uppercase">Total Experiance</h6>
                                            </div>
                                        </div><hr/>
                                        <h2 class="text-center"><?php calculateTotalMonthsAndConvert()?></h2>
                                        <!-- <input type="text" value="0" class="form-control" name="total_experience" readonly> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bdr-white">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="mb-0 text-uppercase">Total Projects</h6>
                                        </div>
                                    </div><hr/>
                                    <h2 class="text-center"><?=$total_project?></h2>
                                    <!-- <input type="text" class="form-control" value="0" readonly>     -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bdr-white">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="mb-0 text-uppercase">Total Clients</h6>
                                        </div>
                                    </div><hr/>
                                    <h2 class="text-center"><?=$total_client?></h2>
                                    <!-- <input type="text" class="form-control" value="0" readonly> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--end page wrapper -->
       
        <script src="<?=base_url()?>admin-assets/js/img-croper.js"></script>
       
            </script>
             <?php include_once('includes/footer.php') ?>
          
