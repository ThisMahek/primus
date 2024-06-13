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
                                <h6 class="mb-0 text-uppercase">Add Your Skills</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?=$user_data->is_skill==1?'checked':""?> onchange="change_status(this,'is_skill','<?=$skills_count?>')">
                                </div>
                            </div>
                        </div><hr/>
                       
                        <form id="skill_form" method="post">
                        
                        <div class="append-area" >
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary" id="add-class" title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                            
                                <?php 
                                if(!empty($skills_data)){
                                foreach ($skills_data as $key=>$skill) { 
                                  
                                    ?>
                                <div class="items">
                                <input type="hidden"  name="delete_id[]" class="form-control" value="<?=$skill->id?>">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                  
                                        <div class="col-md-12 mb-3">
                                            <label for="skill" class="form-label">Enter Your Skill<span class="text-danger">*</span></label>
                                            <input type="text"  name="skill[]" class="form-control" placeholder="Example : Java"  value="<?=$skill->skill?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="percantage" class="form-label">Mark in Percentage (%)<span class="text-danger">*</span></label>
                                            <select class="form-control"  name="percantage[]">
    <option value="0"<?php echo ($skill->percantage == 0) ? ' selected' : ''; ?>>0%</option>
    <option value="10"<?php echo ($skill->percantage == 10) ? ' selected' : ''; ?>>10%</option>
    <option value="20"<?php echo ($skill->percantage == 20) ? ' selected' : ''; ?>>20%</option>
    <option value="30"<?php echo ($skill->percantage == 30) ? ' selected' : ''; ?>>30%</option>
    <option value="40"<?php echo ($skill->percantage == 40) ? ' selected' : ''; ?>>40%</option>
    <option value="50"<?php echo ($skill->percantage == 50) ? ' selected' : ''; ?>>50%</option>
    <option value="60"<?php echo ($skill->percantage == 60) ? ' selected' : ''; ?>>60%</option>
    <option value="70"<?php echo ($skill->percantage == 70) ? ' selected' : ''; ?>>70%</option>
    <option value="80"<?php echo ($skill->percantage == 80) ? ' selected' : ''; ?>>80%</option>
    <option value="90"<?php echo ($skill->percantage == 90) ? ' selected' : ''; ?>>90%</option>
    <option value="100"<?php echo ($skill->percantage == 100) ? ' selected' : ''; ?>>100%</option>
</select>
                                        </div>
                                    </div>
                                    <hr/>
                                  
                                    <?php if ($key!=0) {
                                    
                                        // Render remove button except for the first element ?>
                    <!-- Repeater Remove Btn -->
                    <div class="row mt-3 mb-5">
                        <div class="col-md-6 repeater-remove-btn">
                        
                            <a class="btn btn-outline-danger remove-btn px-4" title="Remove Column" onclick="removeInputGroup(this)"><i class="bx bx-x"></i></a>
                           
                        </div> 
                        
                    </div>
                <?php } ?>
                                </div>
                                <?php }
                                }else{?>
                                    <div class="items">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                  
                                        <div class="col-md-12 mb-3">
                                            <label for="skill" class="form-label">Enter Your Skill<span class="text-danger">*</span></label>
                                            <input type="text"  name="skill[]" class="form-control" placeholder="Example : Java"  >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="percantage" class="form-label">Mark in Percentage (%)<span class="text-danger">*</span></label>
                                            <select class="form-control"  name="percantage[]">
                                                    <option value="0">0%</option>
                                                    <option value="10">10%</option>
                                                    <option value="20">20%</option>
                                                    <option value="30">30%</option>
                                                    <option value="40">40%</option>
                                                    <option value="50">50%</option>
                                                    <option value="60">60%</option>
                                                    <option value="70">70%</option>
                                                    <option value="80">80%</option>
                                                    <option value="90">90%</option>
                                                    <option value="100">100%</option>
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-5">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div><hr>
                                </div>
                                
                              <?php }?>
                            </div>
                          
                            <div class="col-md-12 text-end">
                                <?php
                                 if(!empty($skills_data)){
                                ?>
                                <button class="btn btn-outline-secondary w-25 " id="submit_skill">Update</button>
                                <?php }else{?>
                                    <button class="btn btn-outline-secondary w-25 " id="submit_skill">Save</button>
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
             $("#add-class").click(function () {
                var group = `<div class="items"><div class="row item-content">
                <div class="col-md-12 mb-3"><label for="skill" class="form-label">Enter Your Skill<span class="text-danger">*</span></label><input type="text" name="skill[]" class="form-control" placeholder="Example : Java" ></div><div class="col-md-12 mb-3"><label for="percantage" class="form-label">Mark in Percentage (%)<span class="text-danger">*</span></label><select class="form-control"  name="percantage[]"><option value="0">0%</option><option value="10">10%</option><option value="20">20%</option><option value="30">30%</option><option value="40">40%</option><option value="50">50%</option><option value="60">60%</option><option value="70">70%</option><option value="80">80%</option><option value="90">90%</option><option value="100">100%</option></select></div></div><div class="row mt-3 mb-3"><div class="col-md-6 repeater-remove-btn"><button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Colloum"><i class="bx bx-x"></i></button></div></div><hr></div>`;
                $(this).closest('form').find('.append-area').append(group);
                //  $(this).parent().after(group);
             });
     
       
        $('#submit_skill').on('click', function() {
                event.preventDefault();
               // alert('hu');
        $.ajax({
            url: '<?php echo base_url("UserDashboard/save_skills"); ?>',
            type: 'POST',
            data: $('#skill_form').serialize(),
         //   dataType: 'json',
            success: function(response) {
                // alert(response);
                // console.log(response);
                if(response == 1) {
                        Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Your data was saved successfully!",
                        });
                        setTimeout(function(){
					window.location.reload();
				},2000);
                }else if(response == 2) {
                            Swal.fire({
                            icon: "error",
                            title: "Oops..",
                            text: "Invalid data submitted. Please fill all field!",
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
    });
});
    function  removeInputGroup(btn) {
            $(btn).closest('.items').remove();
        }
    </script>
      <?php include_once('includes/footer.php') ?>