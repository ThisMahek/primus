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
                                <h6 class="mb-0 text-uppercase">Add Your Skills</h6>
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
                                            <label for="inputEmail1" class="form-label">Enter Your Skill<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Example : Java" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Mark in Percentage (%)<span class="text-danger">*</span></label>
                                            <select class="form-control" required>
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
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