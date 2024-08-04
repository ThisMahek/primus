<header class="xs-header header-transparent header-style2 nav-sticky">
    <div class="container">
        <nav class="xs-menus clearfix">
            <div class="nav-header">
                <a class="nav-brand" href="#"><img src="<?= base_url() ?>landingpage-assets/img/logo-black.png" alt></a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper align-to-right">
                <ul class="nav-menu">
                    <li><a href="#">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">HOW TO USE</a></li>
                    <li><a href="#">CONTACT US</a></li>
                </ul>
                <ul class="xs-menu-tools">
                    <li><a href="#" id="dashboard" class="navSidebar-button long-arrow-btn">Go to Dashboard <span
                                class="long-arrow"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="xs-sidebar-group info-group">
    <div class="xs-overlay black-bg"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget close-btn">
                    <i class="icon icon-cross"></i>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <div class="subscribe-form-wraper banner-portfolio">
                    <div class="agency-banner-content mb-4">
                        <p class="banner-desc mb-0">Login into Your Dashboard</p>
                        <span class="separete-border"></span>

                    </div>
                    <div id="messageDiv" style="color:red"></div>
                    <form id="login_form_id" class="subscribe-form">
                        <div class="col-md-12 mb-3 pl-0">
                            <input type="text" placeholder="Email Id" name="user_email" id="user_email"
                                class="form-control">

                        </div>
                        <br />
                        <div class="col-md-12 mb-5 pl-0">
                            <input type="password" placeholder="Enter Password" name="password" id="password"
                                class="form-control">
                            <a href="#modal-popup-2"
                                class="close-side-widget languageSwitcher-button xs-modal-popup f-end"
                                data-toggle="modal" data-target="#exampleModal">Forgot Password ?</a>
                        </div>
                        <div class="col-md-12 text-left pl-0">
                            <button type="submit" class="long-arrow-btn version-white text-right">SUBMIT <span
                                    class="long-arrow"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="zoom-anim-dialog mfp-hide modal-searchPanel" id="modal-popup-2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xs-search-panel">
                <form action="#" method="POST" class="xs-search-group">
                    <input type="email" class="form-control" name="forgot_email" id="forgot_email"
                        placeholder="Enter Your Email Id."><br>
                    <span id="check_forgot_email" class="text-danger m-3 p-3"></span>
                    <a onclick="check_email_for_forgot_password()" type="submit"
                        class="search-button mfp-close languageSwitcher-button"><i
                            class="icon icon-arrow-right"></i></a>
                    <!-- <a href="#modal-popup-1" type="submit" data-toggle="modal" data-target="#modal-popup-1" class="search-button mfp-close languageSwitcher-button xs-modal-popup"><i class="icon icon-arrow-right"></i></a>  -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="zoom-anim-dialog  modal-searchPanel modal" id="modal-popup-1">
<div style="display:none" id="modal-popup-1">
    <form action="#" method="POST" class="xs-search-group" id="otp-form">
        <input type="text" class="form-control mb-2" name="otp" id="otp" placeholder="Enter 4 Digit OTP">
        <p>* 4 Digit OTP Send to Your Registerd Email address</p>
        <a href="#" type="submit" onclick="myFunction()" class="search-button mfp-close"><i class="icon icon-arrow-right"></i></a>
    </form>
</div>
</div> -->

<div class="zoom-anim-dialog  modal-searchPanel modal" id="modal-popup-1">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xs-search-panel">
                <form action="#" method="POST" class="xs-search-group" id="otp-form">
                
                    <input maxlength="4" minleght="4" type="text" class="form-control mb-2" name="forgot_otp"
                        id="forgot_otp" placeholder="Enter 4 Digit OTP"
                        onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                        <span id="otp_error" class="text-danger m-3 p-3"></span>
                    <p class="m-3 p-3">* 4 Digit OTP Send to Your Registerd Email address</p>
                    <a href="#" type="submit" onclick="verify_otp_forgot_password()" class="search-button mfp-close"><i class="icon icon-arrow-right"></i></a>
                </form>
                <form action="#" method="POST" class="xs-search-group" id="panel">
                    <input type="password" class="form-control mb-2" name="newPassword" id="forgot_password"
                        placeholder="New Password">
                    <span id="forgot_password_error" class="text-danger m-3 p-3"></span>
                    <input type="password" class="form-control mb-2" name="ConfirmnewPassword"
                        id="confirm_forgot_password" placeholder="Confirm New Password">

                    <span id="confirm_password_error" class="text-danger m-3 p-3"></span>
                    <a href="#" onclick="change_otp_password()" type="submit" class="search-otp-button mfp-close"><i class="icon icon-arrow-right"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ====Set New Password==== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    // function otp_modal() {

    // }

    function check_email_for_forgot_password() {
        var forgot_email = $('#forgot_email').val();
        if (forgot_email != "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>UserDashboard/check_email_forgot_password",
                data: { forgot_email: forgot_email },
                success: function (response) {
                    if (response == 1) {
                        $('#modal-popup-2').hide();
                        $('.mfp-wrap').hide();
                        document.getElementById("modal-popup-1").style.display = "block";
                    } else {
                        document.getElementById("check_forgot_email").innerHTML = "Email does not exist";
                    }
                }
            });
        } else {
            document.getElementById("check_forgot_email").innerHTML = "Email Field is required";
        }
    }
    function verify_otp_forgot_password() {
        var forgot_otp = $('#forgot_otp').val();
        if (forgot_otp != "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>UserDashboard/verify_otp_forgot_password",
                data: { forgot_otp: forgot_otp },
                success: function (response) {
                    //alert(response);
                    if (response == 1) {
                        document.getElementById("panel").style.display = "block";
                        document.getElementById("otp-form").style.display = "none";
                    } else if (response == 2) {
                        document.getElementById("otp_error").innerHTML = "Otp is invalid";
                    }
                    else {
                        document.getElementById("otp_error").innerHTML = "Otp has expire";
                    }
                }
            });
        } else {
            document.getElementById("otp_error").innerHTML = "Otp is required";
        }
    }
    function change_otp_password() {
        var forgot_password = $('#forgot_password').val();
        var confirm_forgot_password = $('#confirm_forgot_password').val();
        if (forgot_password && confirm_forgot_password) {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>UserDashboard/change_otp_password",
                data: { forgot_password: forgot_password },
                success: function (response) {
                    
                    if(response==1){
                        document.getElementById("modal-popup-1").style.display = "none";
                        Swal.fire({
                                    title: "Success!",
                                    text: "Password changed successfully!Please Login",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                    willClose: () => {
                                    // Perform an action after the alert closes, e.g., redirect to another page
                                    document.getElementById('dashboard').click();
                                    }
                                });
                    }
                }
            });
            document.getElementById("forgot_password_error").innerHTML = "";
            document.getElementById("confirm_password_error").innerHTML = "";
        } else {
            document.getElementById("forgot_password_error").innerHTML = "Password field is required";
            document.getElementById("confirm_password_error").innerHTML = "Conform Password field is required";

        }
    }
    $('#forgot_password, #confirm_forgot_password').on('keyup', function () {
        if ($('#forgot_password').val() == $('#confirm_forgot_password').val()) {
            $('#confirm_password_error').html('');
        } else
            $('#confirm_password_error').html('Password and confirm password does not match').css('color', 'red');
    })

</script>
<!-- ======================= -->