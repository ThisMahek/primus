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
            <div class="card" id="client-container">
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
                    <form id="clientForm" enctype="multipart/form-data">
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
                                            
                                            <input type="file" name="logo[]" class="form-control" accept="image/*"  >
                                                     <?php }else{?>
                                                        <input type="file" name="logo[]" class="form-control"  accept="image/*"   hidden>
                                                        <span id="sp_img" style="color:red"></span>
                                                         <?php }?>
                                                         <!-- onchange="add_preview(this, 'imagePreview', 'sp_img','client_button','170','103')"  -->
                                    </div>

                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="url" class="form-label">Client's Website URL<span
                                                class="text-danger">*</span></label>
                                                <input type="hidden" name="previous_url[]" value="<?=$row->url?>">
                                                <?php if ($key!=0) {?>
                                            
                                        <input name="url[]" type="url" value="<?=$row->url?>" class="form-control" >
                                        <?php } else{?>
                                            <input name="url[]" type="url" value="<?=$row->url?>" class="form-control" readonly >
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
                                                class="text-danger">* </span></label>
                                        <input type="file" name="logo[]" class="form-control"  accept="image/*"   >
                                        <span id="sp_img" style="color:red"></span>
                                    </div>
                                    <!-- onchange="add_preview(this, 'imagePreview', 'sp_img','client_button','170','103')" -->
                                    <div class="col-md-12 mb-3">
                                        <label for="url" class="form-label">Client's Website URL<span
                                                class="text-danger">*</span></label>
                                        <input name="url[]" type="url" class="form-control" >
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                               
                                <hr>
                            </div>
<?php }?>
                        </div>
                        <div class="col-md-12 text-end">
                           
                        
                       <?php if(!empty($client_data)){
                                ?>
                                 <button  class="btn btn-outline-secondary w-25" id="client_button">Update</button>
                                <?php }else{?>
                                    <button  class="btn btn-outline-secondary w-25" id="client_button">Save</button>
                                    <?php }?>
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
        let i = 1;
        $("#add-class").click(function () {
            i++;
            var group = `<div class="items"><div class="row item-content"><div class="col-md-12 mb-3"><label for="logo" class="form-label">Upload Logo of Your Clients<span class="text-danger">* </span></label> <input type="hidden" name="id[]" value=""> <input type="hidden" name="previous_file_name[]" value=""><input type="file" name="logo[]" accept="image/*"  class="form-control" > <span id="sp_img${i}" style="color:red"></span></div><div class="col-md-12 mb-3"><label for="url" class="form-label">Client's Website URL<span class="text-danger">*</span></label><input name="url[]" type="url" class="form-control" ></div></div><div class="row mt-3"><div class="col-md-6 repeater-remove-btn"><button type="button" class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x" onclick="removeInputGroup(this)"></i></button></div></div><hr></div>`;
            $(this).closest('form').find('.append-area').append(group);
        });

        $('#clientForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?= base_url() ?>UserDashboard/save_client',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                       // alert(res.message);
                       Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Your data was saved successfully!'
                        }).then(function() {
                            // Example: Reload only specific part of the page
                            location.reload(); // Implement this function to update specific content
                        });
                       
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Oops..",
                        text: "Invalid data submitted. Please fill all field!",
                    });

                        //alert('Error: ' + res.message);
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });

    function removeInputGroup(btn) {
        $(btn).closest('.items').remove();
    }
</script>

    <?php include_once('includes/footer.php') ?>
</body>
</html>
