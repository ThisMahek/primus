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
                            <h6 class="mb-0 text-uppercase">Add Your Skills</h6>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    
                            </div>
                        </div>
                    </div>
                    <hr />

                    <form id="skill_form" method="post">

                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary" id="add-class-award"
                                    title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                            <div class="items">
                                <!-- Repeater Content -->
                                <div class="row item-content">
                                <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Title<span
                                                class="text-danger">*</span></label>
                                        <input name="title[]" type="text" class="form-control" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="logo" class="form-label">Upload Image <span
                                                class="text-danger">* </span></label>
                                        <input type="file" name="image[]" class="form-control"  accept="image/*"  >
                                        <span id="sp_img" style="color:red"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Description<span
                                                    class="text-danger">*</span> (Max 100 words Accepted)</label>
                                                    <div id="editor" name="description"></div>
                                        </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                               
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-outline-secondary w-25 " id="submit_skill">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    <?php include_once ('includes/footer.php') ?>