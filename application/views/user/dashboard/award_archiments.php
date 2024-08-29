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
            <div class="card" id="award-container">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0 text-uppercase">Add Award Archiments</h6>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-check form-switch text-end">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    <?= $user_data->is_award == 1 ? 'checked' : "" ?>
                                    onchange="change_status(this,'is_award','<?= $award_count ?>')">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <form id="awardForm" method="POST" enctype="multipart/form-data">
                        <div class="append-area">
                            <!-- Repeater Heading -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <button type="button" class="btn btn-outline-primary  repeater-add-btn px-4"
                                    title="Add More Colloum" id="add-class-award"><i class="bx bx-plus"></i></button>
                            </div>
                            <!-- Repeater Items -->
                            <?php
                            if (!empty($award_data)) {
                                $i = -1;
                                foreach ($award_data as $key => $row) {
                                    $i++;

                                    ?>

                                    <div class="items">

                                        <!-- Repeater Content -->
                                        <div class="row item-content">
                                            <input type="hidden" name="id[]" value="<?= $row->id ?>">
                                            <div class="col-md-12 mb-3">
                                                <label for="url" class="form-label">Title<span
                                                        class="text-danger">*</span></label>
                                                <!-- <input type="hidden" name="title[]" value="<?= $row->title ?>"> -->

                                                <input name="title[]" type="text" value="<?= $row->title ?>"
                                                    class="form-control">

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <!-- <label for="logo" class="form-label">Upload Logo of Your Clients<span
                                                class="text-danger">* </span>(Logo must be in 170 × 103 px)</label>-->

                                                <input type="hidden" name="previous_file_name[]" value="<?= $row->image ?>">
                                                <img src="<?= base_url('assets/upload/award/' . $row->image) ?>"
                                                    alt="Existing Logo" width="330" height="192">
                                       
                                                    
                                                    <input type="file" name="image[]" class="form-control" accept="image/*"   >
                                           
                                                        
                                                    <span id="sp_img" style="color:red"></span>
                                               

                                            </div>



                                        </div>
                                        <div class="mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span
                                                    class="text-danger">*</span> (Max 40 words Accepted)</label>

                                            <div class="editor" id="editor-award<?= $i ?>" data-index="<?= $i ?>">
                                                <?= $row->description ?></div>
                                        </div>
                                        <!-- Repeater Remove Btn -->
                                        <?php if ($key != 0) { ?>
                                            <div class="row mt-3">
                                                <div class="col-md-6 repeater-remove-btn">

                                                    <button type="button" class="btn btn-outline-danger remove-btn px-4"
                                                        title="Remove Colloum"
                                                        onclick="remove_db_data(<?= $row->id ?>,'tbl_award')"><i
                                                            class="bx bx-x"></i></button>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <hr>
                                    </div>
                                <?php }

                            } else { ?>



                                <div class="items">
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="url" class="form-label">Title<span
                                                    class="text-danger">*</span></label>
                                            <input name="title[]" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="logo" class="form-label">Upload Image<span class="text-danger">*
                                                </span></label>
                                            <input type="file" name="image[]" class="form-control" accept="image/*"
                                               >
                                            <span id="sp_img" style="color:red"></span>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="file" class="mb-2">Add Some Description <span
                                                    class="text-danger">*</span> (Max 40 words Accepted)</label>
                                        </div>

                                        <div class="editor" id="editor-award0" data-index="0"></div>

                                    </div>

                                </div>
                                <!-- Repeater Remove Btn -->

                                <hr>
                            </div>
                        <?php } ?>
                </div>
                <div class="col-md-12 text-end">


                    <?php if (!empty($award_data)) {
                        ?>
                        <button class="btn btn-outline-secondary w-25" id="award_button">Update</button>
                    <?php } else { ?>
                        <button class="btn btn-outline-secondary w-25" id="award_button">Save</button>
                    <?php } ?>
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
        var award = <?php echo empty($award_data) ? 1 : count($award_data); ?>;
        var quillEditors = [];

        $(document).ready(function () {
            // Initialize existing Quill editors
            $('.editor').each(function () {
                var id = $(this).attr('id');
                var dataIndex = $(this).data('index');
                var quill = new Quill('#' + id, {
                    theme: 'snow'
                });
                quillEditors[dataIndex] = quill;
            });
            // Add new Quill editor dynamically
            $("#add-class-award").click(function () {
                var group = `<div class="items">
  <div class="row item-content">
    <div class="col-md-12 mb-3">
      <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
      <input name="title[]" type="text" class="form-control">
    </div>
  </div>
  <div class="col-md-12 mb-3">
    <label for="image" class="form-label">Upload Image<span class="text-danger">*</span></label>
    <input type="hidden" name="id[]" value="">
    <input type="hidden" name="previous_file_name[]" value="">
    <input type="file" name="image[]" accept="image/*" class="form-control">
    <span id="sp_img${award}" style="color:red"></span>
  </div>
  <div class="mt-3">
    <label for="file" class="mb-2">Add Some Description <span class="text-danger">*</span> (Max 40 words Accepted)</label>
  </div>
  <div class="editor" id="editor-award${award}" data-index="${award}"></div>
  <div class="row mt-3">
    <div class="col-md-6 repeater-remove-btn">
      <button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Column">
        <i class="bx bx-x"></i>
      </button>
    </div>
  </div>
  <hr>
</div> 
`;

                $(this).closest('form').find('.append-area').append(group);

                // Initialize the new Quill editor
                var quill = new Quill('#editor-award' + award, {
                    theme: 'snow'
                });

                quillEditors[award] = quill;
                award++;
            });


            $('#award_button').on('click', function (event) {
                event.preventDefault();

                // Use FormData to handle file uploads
                var formData = new FormData($('#awardForm')[0]);

                // Collect content from each Quill editor and append it to FormData
                $.each(quillEditors, function (award_index, quill) {
                    if (quill) {
                        formData.append('description[' + award_index + ']', quill.root.innerHTML);
                    }
                });

                $.ajax({
                    url: '<?= base_url() ?>UserDashboard/save_award',
                    method: 'POST',
                    data: formData,
                    // dataType:JSON,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //alert(response);
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
                    },
                    error: function () {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>