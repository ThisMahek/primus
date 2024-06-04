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
                                <h6 class="mb-0 text-uppercase">Add Your Projects</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                            </div>
                        </div><hr/>
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#pills-addProject" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-plus font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Add Project</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#pills-viewProject" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-list-ul font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">View Projects</div>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="nav-item" role="presentation" style="display:none;">
                                <a class="nav-link" data-bs-toggle="pill" href="#pills-editProject" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-edit font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Edit Project</div>
                                    </div>
                                </a>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-addProject" role="tabpanel">
                                <form action="">
                                    <div class="items" data-group="test">
                                        <!-- Repeater Content -->
                                        <div class="row item-content">
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Project Name" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project URL</label>
                                                <input type="url" class="form-control" placeholder="Enter Project URL" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Your Working Role <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Example : Project Manager" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Upload Feature Image<span class="text-danger">*</span> (Image must be in 330 × 192 px )</label>
                                                <input class="form-control"  type="file" id="" accept="image/*"  required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project Description<span class="text-danger">*</span> (Max 40 words Accepted)</label>
                                                <textarea class="form-control" aria-label="With textarea" style="height: 110px;" required></textarea>
                                            </div>
                                            <div class="col-md-12 text-end">
                                                <button class="btn btn-outline-secondary w-25">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-viewProject" role="tabpanel">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Feature Image</th>
                                                <th>Project Name</th>
                                                <th>Project URL</th>
                                                <th>Working Role</th>
                                                <th>Project Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="<?=base_url()?>admin-assets/images/login-images/login-cover.svg" alt="" ></td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>Project Manager</td>
                                                <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</td>
                                                <td>
                                                    <button class="btn btn-outline-success" title="Edit Project" data-bs-toggle="modal" data-bs-target="#editProject"><i class="bx bx-edit">123</i></button>
                                                    <button class="btn btn-outline-danger" title="Delete Project"><i class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                           
                            <!-- <div class="tab-pane fade show active" id="pills-editProject" role="tabpanel" style="display:none;">
                                <form action="">
                                    <div class="items" data-group="test">
                                        <div class="row item-content">
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Project Name" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project URL</label>
                                                <input type="url" class="form-control" placeholder="Enter Project URL" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Your Working Role <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Example : Project Manager" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Upload Feature Image<span class="text-danger">*</span> (Image must be in 330 × 192 px )</label>
                                                <input class="form-control"  type="file" id="" accept="image/*"  required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail1" class="form-label">Project Description<span class="text-danger">*</span> (Max 40 words Accepted)</label>
                                                <textarea class="form-control" aria-label="With textarea" style="height: 110px;" required></textarea>
                                            </div>
                                            <div class="col-md-12 text-end">
                                                <button class="btn btn-outline-secondary w-25">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
					</div>
					</div>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        <?php include_once('includes/footer.php') ?>
        <script src="<?=base_url()?>admin-assets/plugins/form-repeater/repeater.js"></script>
        <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
    </body>
</html>