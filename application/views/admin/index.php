<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="logo/favicon.png" type="image/png" />
	<!--plugins-->
	<link href="<?=base_url()?>admin-assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?=base_url()?>admin-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url()?>admin-assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?=base_url()?>admin-assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url()?>admin-assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url()?>admin-assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>admin-assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?=base_url()?>admin-assets/css/app.css" rel="stylesheet">
	<link href="<?=base_url()?>admin-assets/css/icons.css" rel="stylesheet">
	<title>easyprofile - user login</title>
	<style>
		.form-control {opacity:50%;}
		.btn-primary {background-color:#6d6d6e;border-color:#6d6d6e;}
		.btn-primary:hover {background-color:black;border-color:black;}
		a{color:#6d6d6e;}
		a:hover{color:black;}
	</style>
</head>

<body class="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 mt-5">
				<div class="aligns-items-center justify-content-center card text-center mt-5" style="background-image: url('<?=base_url()?>admin-assets/images/login-bg.png');">
					<div class="card-body">
						<div class="row ">
							<div class="col-md-3 text-start mb-4">
								<img src="<?=base_url()?>logo/logo-black.png" class="w-100" alt="" />
							</div>
							<div class="col-md-12 text-start">
								<div class="mb-4">
									<h5 class="mb-0">Hii Admin, Please log in to your account</h5>
								</div>
								<form class="g-3" action="admin/dashboard/">
									<div class="col-md-6 mb-3">
										<label for="inputEmailAddress" class="form-label">Email<span class="text-danger">*<span></label>
										<input type="email" class="form-control" id="inputEmailAddress" placeholder="Enter Email Id." require>
									</div>
									<div class="col-md-6 mb-3">
										<label for="inputChoosePassword" class="form-label">Password<span class="text-danger">*<span></label>
										<div class="input-group" id="show_hide_password" >
											<input type="password" class="form-control border-end-0" require id="inputChoosePassword"  placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
										</div>
									</div>
									<div class="col-md-6 text-end mb-3">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
									</div>
									<div class="col-md-6 mb-3">
										<div class="d-grid">
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jqery validate cdn -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="<?=base_url()?>admin-assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <!-- <script src="admin-assets/js/jquery.min.js"></script> -->
    <script src="<?=base_url()?>admin-assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?=base_url()?>admin-assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?=base_url()?>admin-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?=base_url()?>admin-assets/js/app.js"></script>
</body>
<?= $this->session->flashdata('error')?>
<?= $this->session->flashdata('success')?>
</html>