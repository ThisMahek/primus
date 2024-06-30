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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0 text-uppercase">Update Your Profile</h6>
                        </div>
                    </div>
                    <hr />
                    <form method="post" class="row g-3" id="user_profile" name="user_profile">
                        <input type="hidden" name="user_id" value="<?= $user_data->id ?>">
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">First Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="first_name"
                                value="<?= $user_data->first_name ?>" name="first_name"
                                placeholder="Enter Your First Name">
                            <span id="firstname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Last Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="last_name" value="<?= $user_data->last_name ?>"
                                name="last_name" placeholder="Enter Your Last Name" >
                            <span id="lastname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputmobileno" class="form-label">Mobile No<span
                                    class="text-danger">*<span></label>
                                    <input type="number" class="form-control" id="mobile_no"
                                    value="<?= $user_data->mobile_no ?>" name="mobile_no"
                                    placeholder="Enter Your Mobile No." >
                            <span id="mobile_no_error" class="error_msg"></span>
                        </div>
                       
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Email<span
                                    class="text-danger">*<span></label>
                            <input type="email" class="form-control" value="<?= $user_data->email_id ?>" readonly
                                id="email_id" name="email_id" placeholder="Enter Your Email Id." >
                            <span id="email_id_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Designation<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="designation" value="<?= $user_data->designation ?>"
                                name="designation" placeholder="Enter Your Designation" >
                            <span id="designation_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Country<span
                                    class="text-danger">*<span></label>
                            <select class="form-select country_change" id="country_id" name="country"
                                onchange="getStates(this.value)">
                                <option value="">Select Country ...</option>
                                <?php
                                foreach ($countries as $country) {
                                    ?>
                                    <option value="<?= $country->id ?>" <?= ($country->id == $user_data->country) ? 'selected' : "" ?>><?= $country->name ?>
                                    </option>
                                <?php } ?>

                            </select>
                            <span id="country_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">State<span
                                    class="text-danger">*<span></label>
                            <select class="form-select" id="state_id" name="state" onchange="getCities(this.value)">
                                <option value="">Select State</option>
                            </select>
                            <span id="state_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">City<span
                                    class="text-danger">*<span></label>
                            <select class="form-select" id="city_id" name="city" >
                                <option value="">Select City</option>
                            </select>

                            <span id="city_error" class="error_msg"></span>
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
                var country_id = "<?= $user_data->country ?>";
                var state_id = "<?= $user_data->state ?>";
                var city_id = "<?= $user_data->city ?>";

                if (country_id) {
                    getStates(country_id, state_id, city_id);
                }

            });

            function getStates(country_id, selected_state_id = null, selected_city_id = null) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/User/get_state',
                    data: { country_id: country_id },
                    success: function (html) {
                        $('#state_id').html(html);
                        if (selected_state_id) {
                            $('#state_id').val(selected_state_id);
                            getCities(selected_state_id, selected_city_id);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching states:', status, error);
                    }
                });
            }

            function getCities(state_id, selected_city_id = null) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/User/get_city',
                    data: { state_id: state_id, selected_city_id: selected_city_id },
                    success: function (html) {
                        $('#city_id').html(html);
                        if (selected_city_id) {
                            $('#city_id').val(selected_city_id);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching cities:', status, error);
                    }
                });
            }
            $(document).ready(function () {
                $('#user_profile').validate({
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        mobile_no: {
                            required: true,
                            digits: true,
                            rangelength: [10, 10],
                        }, 
                        designation:{
                            required: true,
                        },
                        country: {
                            required: true,
                        },
                        state: {
                            required: true,
                        },
                        city: {
                            required: true,
                        }
                    },
                        messages: {
                    first_name: {
                        required: "Enter First Name",
                    },
                    last_name: {
                        required: "Enter Last Name",
                    },
                    mobile_no: {
                        required: "Enter Mobile No.",
                    },
                    designation: {
                        required: "Enter Designation",
                    },
                    country: {
                        required: "Select Country",
                    },
                    state: {
                        required: "Select State",
                    },
                    city: {
                        required: "Select City",
                    }
                   
                    },
               
                    submitHandler: function (form, e) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: '<?= base_url() ?>UserDashboard/update_profile',
                            data: $('#user_profile').serialize(),
                            success: function (response) {
                                if (response == 1) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: "Profile Updated successfully!",
                                    });
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 2000);
                                }  else if (response == 2) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "Invalid data submitted. Please fill all field!",
                                    });

                                }  else if (response == 4) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops..",
                                        text: "Mobile no. already exists!",
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