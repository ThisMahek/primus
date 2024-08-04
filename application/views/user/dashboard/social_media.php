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
                            <h6 class="mb-0 text-uppercase">Add Social Media Link</h6>
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
                 
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-addProject" role="tabpanel">
                            <form id="addProjectForm" name="addprojectform" method="post" enctype=multipart/form-data>
                                <div class="items" data-group="test">
                                   
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                    <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Linkdin Id</label>
                                            <input type="text" name="linkdin_id" class="form-control" placeholder="Enter Linkdin Id">
                                               
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Facebook Id</label>
                                            <input type="text" name="facebook_id" class="form-control"  placeholder="Enter Facebook Id">
                                               
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Twitter Id</label>
                                            <input type="text" name="twitter_id" class="form-control"   placeholder="Enter Twitter Id">
                                               
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Pinterest Id</label>
                                            <input type="text" name="pinterest_id" class="form-control"  placeholder="Enter Pinterest Id">
                                               
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Instragram Id</label>
                                            <input type="text" name="instragram_id" class="form-control"  placeholder="Enter Instagram Id">
                                               
                                        </div>
                                     
                                      
                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-outline-secondary w-25"
                                                id="projectsubmitButton">Save</button>
                                        </div>
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
    <?php include_once ('includes/footer.php') ?>
    