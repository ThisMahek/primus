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
                                <h6 class="mb-0 text-uppercase">Add About Us</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                            </div>
                        </div><hr/>
                        <form action="">
                            <div class="mt-3">
                                <label for="file" class="mb-2">Add Your Introduction <span class="text-danger">*</span> (Only 100 words Accepted)</label>
                                <textarea id="editor" required name="" id="" cols="30" rows="20"></textarea>
                            </div>
                            
                            <div class="mt-3">
                                <label for="file" class="mb-2">Upload Your CV/Resume<span class="text-danger">*</span> (Only .pdf Accepted)</label>
                                <input type="file" name="" id="" class="form-control" accept = "application/pdf" required>
                            </div>
                            <div class="col-md-12 text-end">
                                <button class="btn btn-outline-secondary mt-4 w-25">Save</button>
                            </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        <?php include_once('includes/footer.php') ?>
    </body>
</html>