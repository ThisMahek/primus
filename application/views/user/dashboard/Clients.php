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
                            <h6 class="mb-0 text-uppercase">Add Your Clients</h6>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  <?=$user_data->is_client==1?'checked':""?> onchange="change_status(this,'is_client','<?=$client_count?>')">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <form action="<?= base_url() ?>UserDashboard/save_client" method="post" enctype="multipart/form-data">
                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary  repeater-add-btn px-4"
                                    title="Add More Colloum" id="add-class"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                               <?php
                               if(!empty($client_data)){
                                foreach($client_data as $key=>$row)
                               {
                               ?>

                            <div class="items">
                          
                                <!-- Repeater Content -->
                                <div class="row item-content">
                                <input type="hidden" name="id[]" value="<?=$row->id?>">
                                    <div class="col-md-12 mb-3">
                                        <!-- <label for="logo" class="form-label">Upload Logo of Your Clients<span
                                                class="text-danger">* </span>(Logo must be in 170 × 103 px)</label>-->
                                                
                                        <input type="hidden" name="previous_file_name[]" value="<?=$row->logo?>">
                                        <img src="<?= base_url('assets/upload/logo/' . $row->logo) ?>" alt="Existing Logo" width="170" height="103">
                                        <?php if ($key!=0) {?>
                                            
                                            <input type="file" name="logo[]" class="form-control" accept="image/*"  hidden>
                                                     <?php }else{?>
                                                        <input type="file" name="logo[]" class="form-control"  accept="image/*"   onchange="add_preview(this, 'imagePreview', 'sp_img','client_button','170','256')">
                                                        <span id="sp_img" style="color:red"></span>
                                                         <?php }?>
                                                     
                                    </div>

                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="url" class="form-label">Client's Website URL<span
                                                class="text-danger">*</span></label>
                                                <input type="hidden" name="previous_url[]" value="<?=$row->url?>">
                                                <?php if ($key!=0) {?>
                                            
                                        <input name="url[]" type="url" value="<?=$row->url?>" class="form-control" readonly>
                                        <?php } else{?>
                                            <input name="url[]" type="url" value="<?=$row->url?>" class="form-control" >
<?php } ?>                                        </div>
                                </div>
                                   <!-- Repeater Remove Btn -->
                                   <?php if ($key!=0) {?>
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            
                                            <button  type="button" class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum" onclick="remove_db_data(<?=$row->id?>,'tbl_client')"  ><i class="bx bx-x"></i></button>
                                        </div>
                                    </div>
                                
                                <?php }?>
                                <hr>
                                </div>
                            <?php } }else{?>


                            
                            <div class="items">
                                <!-- Repeater Content -->
                                <div class="row item-content">
                                    <div class="col-md-12 mb-3">
                                        <label for="logo" class="form-label">Upload Logo of Your Clients<span
                                                class="text-danger">* </span>(Logo must be in 170 × 103 px)</label>
                                        <input type="file" name="logo[]" class="form-control"  accept="image/*"  required onchange="add_preview(this, 'imagePreview', 'sp_img','client_button','170','256')">
                                        <span id="sp_img" style="color:red"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="url" class="form-label">Client's Website URL<span
                                                class="text-danger">*</span></label>
                                        <input name="url[]" type="url" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                               
                                <hr>
                            </div>
<?php }?>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-outline-secondary w-25" id="client_button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
        <script>
              $(document).ready(function () {
                let i=1;
             $("#add-class").click(function () {
                i++;
                var group = `<div class="items"><div class="row item-content"><div class="col-md-12 mb-3"><label for="logo" class="form-label">Upload Logo of Your Clients<span class="text-danger">* </span>(Logo must be in 170 × 103 px)
                </label> <input type="hidden" name="id[]" value=""> <input type="hidden" name="previous_file_name[]" value=""><input type="file" name="logo[]" accept="image/*"  onchange="add_preview(this, 'imagePreview','sp_img'+${i},'client_button','300','192')" class="form-control" required>  <span id="sp_img${i}" style="color:red"></span></div><div class="col-md-12 mb-3"><label for="url" class="form-label">Client's Website URL<span class="text-danger">*</span></label><input name="url[]" type="url" class="form-control" required></div></div><div class="row mt-3"><div class="col-md-6 repeater-remove-btn"><button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x" onclick="removeInputGroup(this)" ></i></button></div></div><hr></div>`;
                $(this).closest('form').find('.append-area').append(group);
             });
        });
        function  removeInputGroup(btn) {
            $(btn).closest('.items').remove();
        }
    </script>
    <?php include_once('includes/footer.php') ?>
   