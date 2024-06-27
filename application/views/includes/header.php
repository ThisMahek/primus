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
                    <li><a href="#" id="dashboard" class="navSidebar-button long-arrow-btn">Go to Dashboard <span class="long-arrow"></span></a></li>
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
                        <p class="banner-desc mb-0">Login into  Your Dashboard</p>
                        <span class="separete-border"></span>
                       
                    </div>
                    <div id="messageDiv" style="color:red"></div>
                    <form id="login_form_id" class="subscribe-form">
                        <div class="col-md-12 mb-3 pl-0">
                            <input type="text" placeholder="Email Id"  name="user_email" id="user_email" class="form-control">

                        </div>
                        <br/>
                        <div class="col-md-12 mb-5 pl-0">
                            <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control">
                            <a href="#modal-popup-2" class="close-side-widget languageSwitcher-button xs-modal-popup f-end" data-toggle="modal" data-target="#exampleModal">Forgote Password ?</a>
                        </div>
                        <div class="col-md-12 text-left pl-0">
                            <button type="submit" class="long-arrow-btn version-white text-right" >SUBMIT <span class="long-arrow"></span></button>
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
                <!-- <form action="#" method="POST" class="xs-search-group"> -->
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Id. jj">
                    <a href="#modal-popup-1" type="submit" data-toggle="modal" data-target="#modal-popup-1" class="search-button mfp-close languageSwitcher-button xs-modal-popup"><i class="icon icon-arrow-right"></i></a>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<div class="zoom-anim-dialog mfp-hide modal-searchPanel" id="modal-popup-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xs-search-panel">
                <!-- <form action="#" method="POST" class="xs-search-group" id="otp-form"> -->
                    <input type="number" class="form-control mb-2" name="otp" id="otp" placeholder="Enter 4 Digit OTP">
                    <p>* 4 Digit OTP Send to Your Registerd Email address</p>
                    <a href="#" type="submit" onclick="myFunction()"  class="search-button mfp-close"><i class="icon icon-arrow-right"></i></a>
                <!-- </form> -->
                <!-- <form action="#" method="POST" class="xs-search-group" id="panel"> -->
                    <input type="password" class="form-control mb-2" name="newPassword" id="newPassword" placeholder="New Password">
                    <input type="password" class="form-control mb-2" name="ConfirmnewPassword" id="ConfirmnewPassword" placeholder="Confirm New Password">
                    <a href="#" type="submit"  class="search-otp-button mfp-close"><i class="icon icon-arrow-right"></i></a>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<!-- ====Set New Password==== -->
<script>
    function myFunction() {
        document.getElementById("panel").style.display = "block";  
    document.getElementById("otp-form").style.display = "none";
    }
</script>
<!-- ======================= -->

