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
                    <form method="post" class="row g-3" id="form_id" name="form_id">
                        <input type="hidden" name="user_id" value="<?= $user_data->id ?>">
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">First Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="firstName" value="<?= $user_data->first_name ?>"
                                name="first_name" placeholder="Enter Your First Name">
                            <span id="firstname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Last Name<span
                                    class="text-danger">*<span></label>
                            <input type="text" class="form-control" id="lastName" value="<?= $user_data->last_name ?>"
                                name="last_name" placeholder="Enter Your Last Name" required>
                            <span id="lastname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Mobile No.<span
                                    class="text-danger">*<span></label>

                            <div class="input-group mb-6">

                                <input type="number" class="form-control" id="mobileNo"
                                    value="<?= $user_data->mobile_no ?>" name="mobile_no"
                                    placeholder="Enter Your Mobile No." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Email<span
                                    class="text-danger">*<span></label>
                            <input type="email" class="form-control" value="<?= $user_data->email_id ?>" readonly
                                id="emailId" name="emailId" placeholder="Enter Your Email Id." required>
                            <span id="email_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmailAddress" class="form-label">Country<span
                                    class="text-danger">*<span></label>
                            <select class="form-select country_change" id="country_id" name="country">
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
                            <select class="form-select" id="city_id" name="city" required>
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
        data: { country_id: country_id, selected_state_id: selected_state_id },
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

        </script>