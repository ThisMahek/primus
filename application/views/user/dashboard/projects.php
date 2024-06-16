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
                            <h6 class="mb-0 text-uppercase">Add Your Projects</h6>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    <?= $user_data->is_project == 1 ? 'checked' : "" ?>
                                    onchange="change_status(this,'is_project')">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#pills-addProject" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-plus font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Add Project</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#pills-viewProject" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-list-ul font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title" id="view_project">View Projects</div>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
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
                            <form id="addProjectForm" name="addprojectform" method="post" enctype=multipart/form-data>
                                <div class="items" data-group="test">
                                <input type="hidden" name="operation" value="add">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Project Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Project Name"
                                                id="project_name" name="project_name">
                                            <span id="project_name_error" class="error_msg"></span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Project URL</label>
                                            <input type="url" name="project_url" class="form-control" id="project_url"
                                                placeholder="Enter Project URL" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Your Working Role <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="working_role" class="form-control"
                                                id="working_role" placeholder="Example : Project Manager" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Upload Feature Image<span
                                                    class="text-danger">*</span> (Image must be in 330 × 192 px
                                                )</label>


                                            <input class="form-control" type="file" id="faeture_image"
                                                name="faeture_image" accept="image/*"
                                                onchange="add_preview(this, 'imagePreview', 'sp_img_add_project','projectsubmitButton','300','192')">
                                            <span id="sp_img_add_project" style="color:red"></span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Project Description<span
                                                    class="text-danger">*</span> (Max 40 words Accepted)</label>
                                            <textarea class="form-control" name="description" id="description"
                                                aria-label="With textarea" style="height: 110px;" maxlength="40"
                                                ></textarea>
                                        </div>
                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-outline-secondary w-25"
                                                id="projectsubmitButton">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-viewProject" role="tabpanel">
                            <div class="table-responsive updated-container">
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
                                        <?php
                                        foreach ($project_data as $row) {
                                            if ($row->project_url != null || $row->project_url != "") {
                                                $project_url = $row->project_url;
                                            } else {
                                                $project_url = "___";
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php

                                                    if (!empty($row->faeture_image)) { ?>
                                                        <img src="<?= base_url() ?>assets/upload/Project_Image/<?= $row->faeture_image ?>"
                                                            alt="" height="100px" width="100px">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url() ?>admin-assets/images/login-images/login-cover.svg"
                                                            alt="">
                                                    <?php } ?>
                                                </td>
                                                <td><?= $row->project_name ?></td>
                                                <td><?= $project_url ?></td>
                                                <td><?= $row->working_role ?></td>
                                                <td><?= $row->description ?></td>
                                                <td>

                                                    <button class="btn btn-outline-success " title="Edit Project"
                                                        data-id="<?= $row->id ?>" data-bs-toggle="modal"
                                                        data-bs-target="#editProject_<?= $row->id ?>" onclick="editChangeproject(<?=$row->id?>)"><i
                                                            class="bx bx-edit"></i></button>
                                                    <button class="btn btn-outline-success delete-btn"
                                                        title="Delete Project"
                                                        onclick="delete_project(<?= $row->id ?>)">Delete</button>
                                                    <!-- <a class="btn btn-outline-danger" href="<?= base_url() ?>/User/delete_project/<?= $row->id ?>"    onclick="return confirm('Are you sure you want to delete this Projects?');" title="Delete Project"><i class="bx bx-trash"></i>Delete</a> -->
                                                </td>
                                            </tr>
                                            <!-- =====Edit Modal===== -->
                                         
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include_once ('includes/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
  <script>
$(document).ready(function() {
    function handleFormSubmit(formSelector) {
        $(formSelector).validate({
            rules: {
                project_name: { required: true },
                project_url: { required: true },
                working_role: { required: true },
                description: { required: true },
                faeture_image: { 
                    required: function(element) {
                    // Check if action is 'add' and conditionally require feature_image
                    var action = $('#operation').val(); // Assuming action is stored in a hidden input with id 'action'
                    return action === 'add';
                }
                 }
            },
            messages: {
                project_name: { required: "Enter Project Name" },
                project_url: { required: "Enter Project URL" },
                working_role: { required: "Enter Working Role" },
                description: { required: "Enter Project Description" },
                faeture_image: { required: "Please Choose Image" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                var formData = new FormData($(formSelector)[0]);
                var operation = $(formSelector).find('input[name="operation"]').val();
                var url = operation === 'add' ? BASE_URL + "UserDashboard/add_project" : BASE_URL + "UserDashboard/edit_project";

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == 1) {
                            if(operation==='edit'){
                                    $('#editProject').modal('hide');
                                
                            $('.updated-container').load(window.location.href + ' .updated-container', function() {
                                $("#view_project").click();
                                
                                $(formSelector)[0].reset();
                            });
                        }else{
                            $('.updated-container').load(window.location.href + ' .updated-container', function() {
                                $("#view_project").click();
                                
                                $(formSelector)[0].reset();
                            });
                        }
                        } else if (response == 2) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops..",
                                text: "Invalid data submitted. Please fill all fields!",
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        }
                    }
                });
            }
        });
    }

    handleFormSubmit('#addProjectForm');
     handleFormSubmit('#editProjectForm');
});


    </script>
   