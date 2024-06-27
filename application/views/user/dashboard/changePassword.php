<!doctype html>
<html lang="en" class="dark-theme">

<head>
    <?php include_once ('includes/main-head.php') ?>
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
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0 text-uppercase">Update Your Password</h6>
                        </div>
                    </div>
                    <hr />
                    <form method="post" class=" g-3" id="change_password_user" name="change_password_user"
                        class="validatedForm">
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">Current Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="old_password"
                                    name="old_password" placeholder="Enter Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                <span id="password_error" class="error_msg"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">New Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="new_password"
                                    name="new_password" placeholder="Confirm Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                            <!-- <div class="error-message">jj</div> -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputChoosePassword" class="form-label">Confirm New Password<span
                                    class="text-danger">*<span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="confirm_password"
                                    name="confirm_password" placeholder="Confirm Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                            <!-- <div class="error-message">jj</div> -->
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary w-25" id="register_button">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--end page wrapper -->
        <?php include_once ('includes/footer.php') ?>

        <script>
            $(document).ready(function () {
                $('#change_password_user').validate({
                    rules: {
                        old_password: {
                            required: true,
                            minlength: 5
                        },
                        new_password: {
                            required: true,
                            minlength: 5
                        },
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#new_password"
                        }
                    }, messages: {
                        old_password: {
                            required: "Current Password is Required",
                        },
                        new_password: {
                            required: "New Password is Required",
                        },
                        confirm_password: {
                            required: "Confirm Password is Required",
                        }
                    },
                    submitHandler: function (form, e) {
                        e.preventDefault();
                        var current_password = $('#old_password').val();
                        var new_password = $('#new_password').val();
                        var confirm_password = $('#confirm_password').val();
                        $.ajax({
                            type: "POST",
                            url: '<?= base_url() ?>UserDashboard/update_change_password',
                            data: { current_password: current_password, new_password: new_password, confirm_password: confirm_password },
                            success: function (response) {
                                if (response == 1) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: "Password changed successfully!",
                                    });
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 2000);
                                } else if (response == 2) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "Current Password do not match",

                                    });

                                } else if (response == 3) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "This password already exists !try with another password",
                                    });

                                } else if (response == 4) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "Invalid data submitted. Please fill all field!",
                                    });

                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "Something went wrong!",
                                    });

                                }
                            }
                        });
                    }
                });
            });

        </script>