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
                                <h6 class="mb-0 text-uppercase">Add Educational Details</h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-check form-switch text-end">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?=$user_data->is_education==1?'checked':""?> onchange="change_status(this,'is_education','<?=$education_count?>')">
                                </div>
                            </div>
                        </div><hr/>
                        
                        <form action="<?=base_url()?>UserDashboard/save_education" method="post">
                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button class="btn btn-outline-primary  repeater-add-btn px-4" id="add-class" title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                          <?php
                          if(!empty($education_data)){
                            foreach($education_data as  $key=>$row)
                          {
                          ?>
                                <div class="items" >
                                <input type="hidden"  name="delete_id[]" class="form-control" value="<?=$row->id?>">
                                    <!-- Repeater Content -->
                                  
                                    <div class="item-content">
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="education_type[]"  value="<?=$row->education_type?>"placeholder="Example : MCA" required  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control"  value="<?=$row->institute?>" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
                                            <input class="form-control" name="year[]"  value="<?=$row->year?>"type="month" id="">
                                        </div>
                                        <div class="mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
</div>
                                        <!-- <div id="editor" required> -->
                                        <textarea class="form-control" maxlength="40" name="description[]" aria-label="With textarea" style="height: 110px;" required><?=$row->description?>
                                    </textarea>
                                    </div>
                                   
                                    <!-- Repeater Remove Btn -->
                                    <?php if ($key!=0) {?>
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum" onclick="removeInputGroup(this)" ><i class="bx bx-x"></i></button>
                                        </div>
                                    </div>
                                
                                <?php }?>
                                <hr>
                                </div>
                               <?php } }else{?>

                                <div class="items" >
                                    <!-- Repeater Content -->
                                  
                                    <div class="item-content">
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="education_type[]" placeholder="Example : MCA" required  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
                                            <input class="form-control" name="year[]"  type="month" id="">
                                        </div>
                                        <div class="mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
</div>
                                        <!-- <div id="editor" required> -->
                                        <textarea class="form-control" maxlength="40"  name="description[]" aria-label="With textarea" style="height: 110px;" required></textarea>
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div><hr>
                                </div>
                                <?php }?>
                            </div>
                            
                           
                            <div class="col-md-12 text-end">
                            <?php
                                 if(!empty($education_data)){
                                ?>
                                <button class="btn btn-outline-secondary w-25 " >Update</button>
                                <?php }else{?>
                                    <button class="btn btn-outline-secondary w-25 " >Save</button>
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
                var group = `<div class="items"><div class="item-content"><div class="mb-3"><label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label><input type="text" class="form-control" name="education_type[]" placeholder="Example : MCA" required></div><div class="mb-3"><label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" required></div><div class="mb-3"><label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label><input class="form-control" name="year[]" type="month" id=""></div><div class="mt-3"><label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label></div><textarea  maxlength="40" class="form-control" name="description[]" aria-label="With textarea" style="height: 110px;" required></textarea></div><div class="row mt-3"><div class="col-md-6 repeater-remove-btn"><button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)"  title="Remove Colloum"><i class="bx bx-x"></i></button></div></div><hr></div>
`;
                $(this).closest('form').find('.append-area').append(group);
                //  $(this).parent().after(group);
             });
        });
        function  removeInputGroup(btn) {
            $(btn).closest('.items').remove();
        }
    </script>
        <?php include_once('includes/footer.php') ?>
    