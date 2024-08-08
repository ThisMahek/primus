<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="zxx">
<?php include_once('includes/header-main.php') ?>
<body>
<?php include_once('includes/header.php') ?>
<style>
    .error{color:red;padding-left:15px;font-size:12px;}
    </style>
<section class="xs-banner banner-portfolio" style="background-image: url(<?= base_url() ?>landingpage-assets/images/banner/portfolio-banner-img.png);" id="portfolio-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 align-self-center m-auto">
                <div class="agency-banner-content">
                    <h2 class="banner-sub-title">JUST</h2>
                    <h3 class="banner-title">Create  Now!</h3>
                    <span class="separete-border"></span>
                    <p class="banner-desc"><br>FOR MORE DETAILS</p>
                    <a href="#masureofbusiness">
                        <svg id="mouse" width="52" height="53" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.0015 32.8231C24.6846 32.8231 23.4074 32.588 22.2052 32.1271C21.0442 31.681 20.0021 31.0411 19.1056 30.2276C18.2106 29.4141 17.5066 28.4656 17.0157 27.4103C16.5057 26.3163 16.25 25.1568 16.25 23.9612V13.5338C16.25 12.3369 16.5087 11.176 17.0157 10.0846C17.5066 9.02934 18.2106 8.08224 19.1056 7.26739C20.0007 6.45387 21.0442 5.81401 22.2052 5.36784C23.4089 4.90431 24.6846 4.67188 26 4.67188C27.3154 4.67188 28.594 4.90698 29.7948 5.36784C30.9558 5.81401 31.9979 6.45387 32.8944 7.26739C33.7894 8.08091 34.4934 9.02934 34.9843 10.0846C35.4943 11.1787 35.75 12.3382 35.75 13.5338V23.9612C35.75 25.1581 35.4913 26.319 34.9843 27.4103C34.4934 28.4656 33.7894 29.4127 32.8944 30.2276C31.9993 31.0411 30.9558 31.681 29.7948 32.1271C28.5955 32.5893 27.3183 32.8231 26.0015 32.8231ZM26.0015 5.36517C21.0471 5.36517 17.0142 9.02934 17.0142 13.5338V23.9612C17.0142 28.4643 21.0456 32.1298 26.0015 32.1298C30.9558 32.1298 34.9887 28.4656 34.9887 23.9612V13.5338C34.9887 9.02934 30.9558 5.36517 26.0015 5.36517Z" fill="black"/>
                            <path id="arrowOne" d="M26.1291 42.9503C25.7631 42.9503 25.4222 42.8207 25.1635 42.5869L17.0169 35.1811C16.7583 34.946 16.6172 34.6361 16.6172 34.3035C16.6172 33.9709 16.7597 33.661 17.0169 33.4258C17.2756 33.1907 17.6166 33.0625 17.9825 33.0625C18.3485 33.0625 18.6895 33.1921 18.9481 33.4258L26.1306 39.954L33.0632 33.6529C33.3218 33.4178 33.6628 33.2896 34.0287 33.2896C34.3947 33.2896 34.7357 33.4192 34.9943 33.6529C35.253 33.888 35.3941 34.198 35.3941 34.5306C35.3941 34.8632 35.2515 35.1731 34.9943 35.4082L27.0947 42.5869C26.839 42.8207 26.4951 42.9503 26.1291 42.9503ZM17.984 33.7585C17.8238 33.7585 17.6724 33.8146 17.5607 33.9188C17.4461 34.023 17.3844 34.1592 17.3844 34.3035C17.3844 34.4478 17.4461 34.5867 17.5607 34.6882L25.7088 42.094C25.8234 42.1982 25.9733 42.2543 26.132 42.2543C26.2908 42.2543 26.4436 42.1982 26.5553 42.094L34.4535 34.9153C34.5681 34.8111 34.6299 34.6748 34.6299 34.5306C34.6299 34.3863 34.5681 34.2474 34.4535 34.1459C34.3389 34.0417 34.1889 33.9856 34.0302 33.9856C33.8715 33.9856 33.7186 34.0417 33.6069 34.1459L26.4025 40.6914C26.254 40.8263 26.0101 40.8263 25.8616 40.6914L18.4088 33.9174C18.2941 33.8159 18.1427 33.7585 17.984 33.7585Z" fill="black"/>
                            <path id="arrowTwo" d="M26.1306 48.005C25.7646 48.005 25.4236 47.8754 25.165 47.6416L17.0169 40.2358C16.7583 40.0007 16.6172 39.6908 16.6172 39.3582C16.6172 39.0256 16.7597 38.7156 17.0169 38.4805C17.2756 38.2454 17.6166 38.1172 17.9825 38.1172C18.3485 38.1172 18.6895 38.2468 18.9481 38.4805L26.1306 45.0087L33.0632 38.7076C33.3218 38.4725 33.6628 38.3443 34.0287 38.3443C34.3947 38.3443 34.7357 38.4739 34.9943 38.7076C35.253 38.9427 35.3941 39.2526 35.3941 39.5853C35.3941 39.9179 35.2515 40.2278 34.9943 40.4629L27.0962 47.643C26.8404 47.8754 26.4965 48.005 26.1306 48.005ZM17.9855 38.8145C17.8253 38.8145 17.6739 38.8706 17.5622 38.9748C17.4476 39.079 17.3858 39.2152 17.3858 39.3595C17.3858 39.5038 17.4476 39.6427 17.5622 39.7442L25.7102 47.1501C25.8249 47.2542 25.9748 47.3104 26.1335 47.3104C26.2922 47.3104 26.4451 47.2542 26.5568 47.1501L34.455 39.9713C34.5696 39.8671 34.6313 39.7309 34.6313 39.5866C34.6313 39.4423 34.5696 39.3034 34.455 39.2019C34.3403 39.0977 34.1904 39.0416 34.0317 39.0416C33.873 39.0416 33.7201 39.0977 33.6084 39.2019L26.4039 45.7474C26.2555 45.8824 26.0115 45.8824 25.8631 45.7474L18.4102 38.9735C18.2956 38.8706 18.1442 38.8145 17.9855 38.8145Z" fill="black"/>
                            <path d="M26.1938 19.1007C24.8225 19.1007 23.707 18.0868 23.707 16.8405V10.9321C23.707 9.68577 24.8225 8.67188 26.1938 8.67188C27.565 8.67188 28.6805 9.68577 28.6805 10.9321V16.8405C28.6805 18.0868 27.565 19.1007 26.1938 19.1007ZM26.1938 9.36784C25.2458 9.36784 24.4727 10.0705 24.4727 10.9321V16.8405C24.4727 17.7021 25.2458 18.4047 26.1938 18.4047C27.1417 18.4047 27.9148 17.7021 27.9148 16.8405V10.9321C27.9148 10.0705 27.1417 9.36784 26.1938 9.36784Z" fill="black"/>
                            <path d="M26.7682 11.4446H25.6204C25.4088 11.4446 25.2383 11.2897 25.2383 11.0973C25.2383 10.905 25.4088 10.75 25.6204 10.75H26.7682C26.9799 10.75 27.1504 10.905 27.1504 11.0973C27.1504 11.2897 26.9813 11.4446 26.7682 11.4446Z" fill="black"/>
                            <path d="M26.7682 12.8353H25.6204C25.4088 12.8353 25.2383 12.6803 25.2383 12.4879C25.2383 12.2956 25.4088 12.1406 25.6204 12.1406H26.7682C26.9799 12.1406 27.1504 12.2956 27.1504 12.4879C27.1504 12.6803 26.9813 12.8353 26.7682 12.8353Z" fill="black"/>
                            <path d="M26.7682 14.2259H25.6204C25.4088 14.2259 25.2383 14.0709 25.2383 13.8786C25.2383 13.6862 25.4088 13.5312 25.6204 13.5312H26.7682C26.9799 13.5312 27.1504 13.6862 27.1504 13.8786C27.1504 14.0709 26.9813 14.2259 26.7682 14.2259Z" fill="black"/>
                            <path d="M26.7682 15.6243H25.6204C25.4088 15.6243 25.2383 15.4694 25.2383 15.277C25.2383 15.0846 25.4088 14.9297 25.6204 14.9297H26.7682C26.9799 14.9297 27.1504 15.0846 27.1504 15.277C27.1504 15.4694 26.9813 15.6243 26.7682 15.6243Z" fill="black"/>
                            <path d="M26.7682 17.0071H25.6204C25.4088 17.0071 25.2383 16.8522 25.2383 16.6598C25.2383 16.4675 25.4088 16.3125 25.6204 16.3125H26.7682C26.9799 16.3125 27.1504 16.4675 27.1504 16.6598C27.1504 16.8522 26.9813 17.0071 26.7682 17.0071Z" fill="black"/>
                        </svg>
                    </a>
                    <div class="banner-paint">
                        <img src="<?= base_url() ?>landingpage-assets/images/banner/paint-2.png" alt>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 align-self-end">
                <form action="#"  id="xs-contact-form" class="contact-form input-material" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input type="text" placeholder="Enter your First Name" onkeypress=" return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"  id="firstName" name="firstName" class="form-control">
                            <!-- <span id="firstname_error" class="error_msg"></span> -->
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="text" placeholder="Enter your Last Name"  onkeypress=" return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" id="lastName" name="lastName" class="form-control">
                            <span id="lastname_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="number" placeholder="Enter your Mobile No." id="mobileNo" name="mobileNo" class="form-control">
                            <span id="mobileno_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="email" placeholder="Enter your Email Id." id="emailId" name="emailId" class="form-control">
                            <span id="email_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="text" placeholder="Profile Category | eg: web developer" id="designation" name="designation" class="form-control">
                            <span id="designation_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="form-control"  id="country" name="country">
                                <option  value="">Select Country ...</option>
                                <?php
                                foreach ($countries as $country) {
                                    ?>
                                    <option value="<?= $country->id ?>">  <?= $country->name ?> </option>
                                      
                                   
                                <?php } ?>

                            </select>
                            <span id="country_error" class="error_msg"></span>
                        </div>

                        <div class="col-md-6 mb-4">
                            <select class="form-control" id="state" name="state">
                                <option selected="" disabled="" value="">Select State</option>

                            </select>
                            <span id="state_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="form-control" id="city" name="city" >
                                <option selected="" disabled="" value="">Select City</option>
                            </select> 
                            <span id="city_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-5">
                            <input type="password" placeholder="Password" id="password_signup" name="password_signup" class="form-control">
                            <span id="password_error" class="error_msg"></span>
                        </div>
                        <div class="col-md-6 mb-5">
                            <input type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" class="form-control">
                                    
                        </div>
                        <div class="col-md-12 mb-4 text-center">
                            <button type="submit" class="long-arrow-btn version-white text-right" id="register_button">SUBMIT <span class="long-arrow"></span></button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>    
</section>
</div>
<?php include_once('includes/footer.php') ?>
<?php include_once('includes/footer-script.php') ?>

<script>
    // document.getElementsByClassName("example");
    document.getElementById('firstName-error').addEventListener('input', function() {
      var elements = document.getElementsByClassName('placeholder-title-two');
      for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add('hidden');
      }
    });
  </script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
<script>
       $(document).ready(function () {
    
            $('#xs-contact-form').validate({
                rules: {
                    firstName: "required",
                    lastName: "required",
                    country: "required",
                    state: "required",
                    city: "required",
                    mobileNo: {
                        required: true,
                        digits: true,
                        rangelength: [10, 10],
                        //	mobileCheck: true
                    },
                    emailId: {
                        required: true,
                        email: true,
                        //emailCheck:true
                    },
                    designation: {
                        required: true,
                    },
                    password_signup: {
                        required: true,
                        rangelength: [6, 6]
                    },
                    confirmpassword: {
                        required: true,
                        equalTo: '#password_signup'
                    },
                },
                messages: {
                    firstName: {
                        required: "Enter First Name",
                    },
                    lastName: {
                        required: "Enter Last Name",
                    },
                    mobileNo: {
                        required: "Enter Mobile No.",
                    },
                    emailId: {
                        required: "Enter Email",
                    },
                    designation: {
                        required: "Enter Designation",
                    },
                    password: {
                        required: "Enter Password",
                    },
                    country: {
                        required: "Select Country",
                    },
                    state: {
                        required: "Select State",
                    },
                    city: {
                        required: "Select City",
                    }, 
                    password_signup: {
                        required: "Enter Password",
                    },
                    confirmpassword: {
                        required: "Enter Confirm Password",
                    }
                },
                submitHandler: function (form, e) {

                    e.preventDefault();
                    //alert(form);
                    let first_name = $('#firstName').val().trim();
                    let last_name = $('#lastName').val().trim();
                    let mobile_no = $('#mobileNo').val();
                    let email_id = $('#emailId').val();
                    let country = $('#country').val();
                    let state = $('#state').val();
                    let city = $('#city').val();
                    let designation = $('#designation').val();
                    let password = $('#password_signup').val();
                   
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>/User/user_register",
                        data: {
                            first_name: first_name,
                            last_name: last_name,
                            mobile_no: mobile_no,
                            email_id: email_id,
                            country: country,
                            state: state,
                            city: city,
                            designation: designation,
                            password: password
                        },
                        success: function (response) {
                            if (response == 1) {
                                $('#xs-contact-form')[0].reset();
                                //$('#userRegistration').modal('hide');
                                Swal.fire({
                                    title: "Success!",
                                    text: "You are registered successfully!Please Login",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                    willClose: () => {
                                    // Perform an action after the alert closes, e.g., redirect to another page
                                    document.getElementById('dashboard').click();
                                    }
                                });
                                //document.getElementById('dashboard').click();
                            } else if (response == 2) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Email already exists!",
                                });
                            } else if (response == 3) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Mobile no. already exists!",
                                });
                            } else if (response == 4) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Email and Mobile no. already exists!",
                                });
                            } else if (response == 5) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Please fill all field!",
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong",
                                });
                            }
                        }
                    });

                }
            });
           //login
           $('#login_form_id').validate({
                rules: {
                    user_email: {
                        required: true,
                        email: true,
                        //emailCheck:true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    user_email: {
                        required: "Enter Email Id",
                    },
                    password: {
                        required: "Enter Password",
                    }
                },
                submitHandler: function (form, e) {
                    e.preventDefault();
                    let email = $('#user_email').val();
                    let password = $('#password').val();
                   

                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>/Login/ProcessLoginUser",
                        dataType:"json",
                        data: {
                            email: email,
                            password: password
                        },
                        success: function (response) {
                            let messageDiv = $('#messageDiv');    
                            if (response.status == 1) {
                                $('#login_form_id')[0].reset();
                                let dashboard_url = '<?= base_url() ?>' + response.user_name + '/dashboard';
                               window.location= dashboard_url;
                            }
                            else if (response.status == 2) {
                                messageDiv.html('<div class="alert alert-danger">Invalid Password!</div>');
                            } else if (response.status == 3) {
                                messageDiv.html('<div class="alert alert-danger">Invalid Id and Password</div>');
                            } else {
                                messageDiv.html('<div class="alert alert-danger">Something went wrong</div>');
                            }
                        }
                    });

                }
            });
           //login

        });
 $(document).ready(function () {
            $('#country').on('change', function () {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url()?>/User/get_state',
                        data: {
                            country_id: country_id
                        },
                        success: function (html) {
                            $('#state').html(html);
                            $('#city').html('<option value="">Select state first</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select country first</option>');
                    $('#city').html('<option value="">Select state first</option>');
                }
            });

            $('#state').on('change', function () {
                var country_id = $('#country').val();
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>User/get_city',
                        data: {
                            state_id: state_id,
                           // country_id: country_id
                        },
                        success: function (html) {
                            $('#city').html(html);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        });
     
</script>
    
<?= $this->session->flashdata('error') ?>
<?= $this->session->flashdata('success') ?>
</body>
</html>