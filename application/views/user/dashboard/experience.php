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
                                <h6 class="mb-0 text-uppercase">Add Your Experience</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?=$user_data->is_experience==1?'checked':""?> onchange="change_status(this,'is_experience','<?=$experience_count?>')">
                                </div>
                            </div>
                        </div><hr/>
                        <form id="experience_form" method="post">
                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary  repeater-add-btn px-4" id="add-class-experience" title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                          <?php
                          if(!empty($experience_data))
                          {
                            foreach($experience_data as $experience=>$row){
                          ?>
                                <div class="items" >
                                <input type="hidden"  name="delete_id[]" class="form-control" value="<?=$row->id?>">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="work_type" class="form-label">Enter Work Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="work_type[]"  placeholder="Example : Web Developer"  value="<?=$row->work_type?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="organisation_name" class="form-label">Enter Organisation Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="organisation_name[]" placeholder="Enter Your Organisation Name"  value="<?=$row->organisation_name?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="website_url" class="form-label">Enter Organisation Website URL <span class="text-danger">*</span></label>
                                            <input type="url" class="form-control" name="website_url[]" placeholder="Enter Your Organisation Website URL"  value="<?=$row->website_url?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="work_from" class="form-label">Work From<span class="text-danger">*</span></label>
                                            <input class="form-control"  name="work_from[]" type="month" id="from_date<?=$row->id?>"  value="<?=$row->work_from?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="work_to" class="form-label">Work To<span class="text-danger">*</span> (Choose Current Month for Till Now)</label>
                                            <input class="form-control" name="work_to[]"  type="month" id="to_date<?=$row->id?>" onchange="daysDifference(<?=$row->id?>)"  placeholder="Till Now"  value="<?=$row->work_to?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="total-exp" class="form-label">Total Experience<span class="text-danger">*</span></label>
                                            <input class="form-control" name="total[]"  type="text" id="result<?=$row->id?>" value="<?=$row->total?>" readonly>
                                        </div>
                                    </div>
                                    <?php if ($experience!=0) {?>
                                    <!-- Repeater Remove Btn -->
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <hr>
                                </div>
<?php }
}else{?>
                                <div class="items" >
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="work_type" class="form-label">Enter Work Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="work_type[]"  placeholder="Example : Web Developer" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="organisation_name" class="form-label">Enter Organisation Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="organisation_name[]"placeholder="Enter Your Organisation Name" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="website_url" class="form-label">Enter Organisation Website URL <span class="text-danger">*</span></label>
                                            <input type="url" class="form-control" name="website_url[]" placeholder="Enter Your Organisation Website URL" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="work_from" class="form-label">Work From<span class="text-danger">*</span></label>
                                            <input class="form-control"  name="work_from[]" type="month" id="from_date1" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="work_to" class="form-label">Work To<span class="text-danger">*</span> (Choose Current Month for Till Now)</label>
                                            <input class="form-control" name="work_to[]"  type="month"  id="to_date1"  onchange="daysDifference(1)"   placeholder="Till Now" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="total-exp" class="form-label">Total Experience<span class="text-danger">*</span></label>
                                            <input class="form-control" name="total[]"  type="text" id="result1" readonly>
                                        </div>
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div><hr>
                                </div>
                                <?php }?>
                        </div>
                        <div class="col-md-12 text-end">
                        <?php
                                 if(!empty($experience_data)){
                                ?>
                                <button class="btn btn-outline-secondary w-25 " id="submit_experience" >Update</button>
                                <?php }else{?>
                                    <button class="btn btn-outline-secondary w-25 " id="submit_experience" >Save</button>
                                    <?php }?>
                        
                        </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        
        <?php include_once('includes/footer.php') ?>
