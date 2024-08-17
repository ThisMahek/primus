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
            foreach($education_data as  $key=>$row) {
      ?>
      <div class="items">
         <input type="hidden"  name="delete_id[]" class="form-control" value="<?=$row->id?>">
         <!-- Repeater Content -->
         <div class="item-content">
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="education_type[]" value="<?=$row->education_type?>" placeholder="Example: MCA">
            </div>
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
               <input type="text"  class="form-control" value="<?=$row->institute?>" name="institute[]" placeholder="Enter Your School/College/Institute/University Name">
            </div>
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
               <input class="form-control" name="year[]" value="<?=$row->year?>" type="month" max="<?php echo date('Y-m'); ?>">
            </div>
            <div class="mt-3">
               <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
               <div class="editor" id="editor-education<?=$i?>" data-index="<?=$i?>"><?=$row->description?></div>
            </div>
            <hr/>
            <?php if ($key != 0) { ?>
            <!-- Repeater Remove Btn -->
            <div class="row mt-3 mb-5">
               <div class="col-md-6 repeater-remove-btn">
                  <button type="button" onclick="remove_db_data(<?=$row->id?>,'tbl_qualification')" class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
               </div>
            </div>
            <?php } ?>
         </div>
      </div> <!-- Closing div for "items" -->
      <?php $i++; } } else { ?>
      <div class="items">
         <!-- Repeater Content -->
         <div class="item-content">
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Enter Qualification Type<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="education_type[]" placeholder="Example: MCA">
            </div>
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Enter School/College/Institute/University Name <span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="institute[]" placeholder="Enter Your School/College/Institute/University Name">
            </div>
            <div class="mb-3">
               <label for="inputEmail1" class="form-label">Year of Passing<span class="text-danger">*</span></label>
               <input class="form-control" name="year[]" type="month" id="" max="<?php echo date('Y-m'); ?>">
            </div>
            <div class="mt-3">
               <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
               <div class="editor" id="editor-education0" data-index="0"></div>
            </div>
            <!-- Repeater Remove Btn -->
            <div class="row mt-3 mb-5">
               <div class="col-md-6 repeater-remove-btn">
                  <button class="btn btn-outline-danger remove-btn px-4" title="Remove Colloum"><i class="bx bx-x"></i></button>
               </div>
            </div>
            <hr>
         </div>
      </div> <!-- Closing div for "items" -->
      <?php } ?>
   </div>
   </div>
   <div class="col-md-12 text-end">
      <?php if(!empty($education_data)) { ?>
      <button class="btn btn-outline-secondary w-25 " id="submit_education">Update</button>
      <?php } else { ?>
      <button class="btn btn-outline-secondary w-25 " id="submit_education">Save</button>
      <?php } ?>
   </div>
</form>
