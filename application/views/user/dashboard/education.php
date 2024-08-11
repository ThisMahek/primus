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
                        
                        <form id="education_form" method="post">
                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary  repeater-add-btn px-4" id="add-class-eduction" title="Add More Colloum"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                          <?php
                          if(!empty($education_data)){
                            $user_id=$this->session->userdata('user_id');
                            $i=0;
                          //  $j=$i;
                            foreach($education_data as  $key=>$row)
                          {
                          ?>
                                <div class="items" >
                                <input type="hidden"  name="delete_id[]" class="form-control" value="<?=$row->id?>">
                                    <!-- Repeater Content -->
                                  
                                    <div class="item-content">
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="education_type[]"  value="<?=$row->education_type?>"placeholder="Example : MCA"   >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control"  value="<?=$row->institute?>" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
                                            <input class="form-control" name="year[]"  value="<?=$row->year?>" type="month" max="<?php echo date('Y-m'); ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
</div>
                                        <!-- <div id="editor" > -->
                                        <div class="editor" id="editor-<?='education'.$i?>"  data-index="<?=$i?>"><?=$row->description?></div>
                                        <!-- <textarea class="form-control" name="description[]" aria-label="With textarea" style="height: 110px;" ><?=$row->description?> -->
                                    </textarea>
                                    </div>
                                   
                                    <!-- Repeater Remove Btn -->
                                    <?php if ($key!=0) {?>
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                          <button type="button"  class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum" onclick="remove_db_data(<?=$row->id?>,'tbl_qualification')" ><i class="bx bx-x"></i></button>
                                        </div>
                                    </div>
                                
                                <?php }
                                $i++
                                ?>
                                <hr>
                                </div>
                               <?php } }else{?>

                                <div class="items" >
                                    <!-- Repeater Content -->
                                  
                                    <div class="item-content">
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="education_type[]" placeholder="Example : MCA"   >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
                                            <input class="form-control" name="year[]"  type="month" id="" max="<?php echo date('Y-m'); ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
</div>
                                        <!-- <div id="editor" > -->
                                        <div  class="editor" id="editor-education0"  data-index="0"></div>
                                        <!-- <textarea class="form-control" name="description[]" aria-label="With textarea" style="height: 110px;" ></textarea> -->
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="row mt-3">
                                        <div class="col-md-6 repeater-remove-btn">
                                            <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
                                        </div>
                                    </div><hr>
                                </div>
                                <?php }
                              
                                ?>
                            </div>
                            
                           
                            <div class="col-md-12 text-end">
                            <?php
                                 if(!empty($education_data)){
                                ?>
                                <button class="btn btn-outline-secondary w-25 " id="submit_education">Update</button>
                                <?php }else{?>
                                    <button class="btn btn-outline-secondary w-25 " id="submit_education">Save</button>
                                    <?php }?>
                        
                            </div>
                        </form>
                     
                        </div>
				</div>
            </div>
        </div>
        <!--end page wrapper -->
        <?php include_once('includes/footer.php') ?>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        
      
var education = <?php echo empty($education_data) ? 1 : count($education_data); ?>; // Start from the count of existing items
var quillEditors = []; // Initialize the Quill editors array first

// Initialize existing Quill editors on document ready
$(document).ready(function () {
    $('.editor').each(function () {
        var id = $(this).attr('id');
        var dataIndex = $(this).data('index');
     //alert(dataIndex);
        var quill = new Quill('#' + id, {
            theme: 'snow'
        });
        var education_index = id; // Corrected to capture the correct index part after 'editor-education'
        quillEditors[dataIndex] = quill;
    });
});

$("#add-class-eduction").click(function () {
    // Append new group
    var group = `
        <div class="items">
            <div class="item-content">
                <div class="mb-3">
                    <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="education_type[]" placeholder="Example : MCA" >
                </div>
                <div class="mb-3">
                    <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="institute[]" placeholder="Enter Your School/College/Institute/University Name" >
                </div>
                <div class="mb-3">
                    <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
                    <input class="form-control" name="year[]" max="` + currentYearMonth + `" type="month" id="">
                </div>
                <div class="mt-3">
                    <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
                </div>
                <div class="editor" id="editor-education${education}" data-index="${education}"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 repeater-remove-btn">
                    <button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Column">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
            </div>
            <hr>
        </div>`;
    
    $(this).closest('form').find('.append-area').append(group);
    
    // Initialize the new Quill editor
    var quill = new Quill('#editor-education' + education, {
        theme: 'snow'
    });
    
    quillEditors[education] = quill;
    education++; // Increment to avoid ID duplication
});

// Submit form with Quill editor content
$('#submit_education').on('click', function (event) {
    event.preventDefault(); // Prevent form submission

    var formData = $('#education_form').serializeArray(); // Get existing form data

    // Collect content from each Quill editor
    $.each(quillEditors, function (education_index, quill) {
        console.log('Index:', education_index);
        console.log('quill:', quill);
        if (quill) { // Check if the editor exists
            formData.push({
                name: 'description[' + education_index + ']',
                value: quill.root.innerHTML // or quill.getText() for plain text
            });
        }
    });

    console.log(formData); // Use console.log to inspect the formData

    $.ajax({
        url: BASE_URL + "UserDashboard/save_education",
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response == 1) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Your data was saved successfully!",
                });
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            } else if (response == 2) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Invalid data submitted. Please fill all fields!",
                });
            } else if (response == 3) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Kindly do any action first!",
                });
            } else if (response == 4) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Description must not exceed 40 words!",
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


        </script>