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
                                <h6 class="mb-0 text-uppercase">Update Your Profile</h6>
                            </div>
                        </div><hr/>
                        <form method="post" class="row g-3" id="form_id" name="form_id">
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Firsth Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="Enter Your First Name">
                            <span id="firstname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Last Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Enter Your Last Name" required>
                            <span id="lastname_error" class="error_msg"></span>
                         </div>
						<div class="col-md-6">
						<label for="inputEmailAddress" class="form-label">Mobile No.<span class="text-danger">*<span></label>
					
                        <div class="input-group mb-3">
                            <select name="" id="" class="form-select" style="max-width: 30%;">
                                <option value="">+91</option>
                                <?php
                                    foreach ($countries as $country) {
                                ?>
                                <option value=""><?=$country->phone_code?></option>
                                <?php }?>
                            </select>
                            <input type="number" class="form-control" id="mobileNo" name="mobileNo" placeholder="Enter Your Mobile No." required>
                        </div>
					</div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Email<span
                                    class="text-danger">*<span></label>
                            <input type="email" class="form-control" id="emailId" name="emailId"
                                placeholder="Enter Your Email Id." required>
                            <span id="email_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Country<span
                                    class="text-danger">*<span></label>
                            <select class="form-select" id="country" name="country">
                                <option selected="" disabled="" value="">Select Country ...</option>
                                <?php
								foreach ($countries as $country) {
									?>
                                <option value="<?= $country->id ?>"><?= $country->name ?></option>
                                <?php } ?>

                            </select>
                            <span id="country_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">State<span
                                    class="text-danger">*<span></label>
                            <select class="form-select" id="state" name="state">
                                <option selected="" disabled="" value="">Select State</option>

                            </select>
                            <span id="state_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">City<span
                                    class="text-danger">*<span></label>
                            <select class="form-select" id="city" name="city" required>
                                <option selected="" disabled="" value="">Select City</option>

                            </select>
                            <span id="city_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">PIN Code<span
                                    class="text-danger">*<span></label>
                            <input type="number" class="form-control" id="pincode" name="pincode"
                                placeholder="Enter PIN Code">
                            <span id="pincode_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputChoosePassword" class="form-label">Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password" name="password"
                                    placeholder="Enter Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                <span id="password_error" class="error_msg"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputChoosePassword" class="form-label">Confirm Password<span
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