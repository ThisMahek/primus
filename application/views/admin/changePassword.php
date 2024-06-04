<!doctype html>
<html lang="en">
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
                <div class="card col-md-6">
					<div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0 text-uppercase">Update Your Password</h6>
                            </div>
                        </div><hr/>
                        <form method="post" class=" g-3" id="form_id" name="form_id">
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">Current Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password" name="password"
                                    placeholder="Enter Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                <span id="password_error" class="error_msg"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">New Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="confirmPassword"
                                    name="confirmpassword" placeholder="Confirm Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">Confirm New Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="confirmPassword"
                                    name="confirmpassword" placeholder="Confirm Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary w-25" id="register_button">Update</button>
                        </div>
                    </form>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        <?php include_once('includes/footer.php') ?>
        <script src="<?=base_url()?>admin-assets/plugins/form-repeater/repeater.js"></script>
    </body>
</html>