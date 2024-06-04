<!doctype html>
<html lang="en" class="dark-theme">
    <head>
        <?php include_once('includes/main-head.php') ?>
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
                <div class="card">
					<div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-uppercase">Add Your Experience</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                            </div>
                        </div><hr/>
                        <div id="repeater">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button class="btn btn-outline-primary  repeater-add-btn px-4" title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                            <form action="">
                                <div class="items" data-group="test">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Work Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Example : Web Developer" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Organisation Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Your Organisation Name" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Organisation Website URL <span class="text-danger">*</span></label>
                                            <input type="url" class="form-control" placeholder="Enter Your Organisation Website URL" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail1" class="form-label">Work From<span class="text-danger">*</span></label>
                                            <input class="form-control"  type="month" id="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail1" class="form-label">Work To<span class="text-danger">*</span> (Choose Current Month for Till Now)</label>
                                            <input class="form-control"  type="month" id=""  placeholder="Till Now" required>
                                        </div>
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div><hr>
                                </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-outline-secondary w-25">Save</button>
                        </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        <?php include_once('includes/footer.php') ?>
        <script src="<?=base_url()?>admin-assets/plugins/form-repeater/repeater.js"></script>
        <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
    </body>
</html>