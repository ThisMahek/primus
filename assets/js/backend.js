
function logoutuser(urll) {
    event.preventDefault();
    const url = urll;
    Swal.fire({
        icon: "warning",
        title: "Are you sure",
        text: "You want to log out!",
        buttons: ["Cancel", "Yes!"],
    }).then(function (value) {
        if (value) {
            window.location.href = url;
        }
    });
}
function copytoClipboard() {
    // Get the text field
    var copyText = document.getElementById("copytoClipboard");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("URL Copied");
}
function delete_project(id) {
    var activeTabId = $('#pills-viewProject');
    var confirmation = confirm("Are you sure you want to delete this project?");
    if (confirmation) {
        $.ajax({
            url: BASE_URL + "UserDashboard/delete_project/" + id,
            type: 'POST',
            success: function (response) {
                if (response == 1) {
                    $('.updated-container').load(window.location.href + ' .updated-container', function () {
                        $(activeTabId).tab('show');
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}
function change_status(val, key, data) {
    var checkboxValue = val.checked;

    var status = checkboxValue ? 1 : 0;
    Swal.fire({
        title: "Are you sure?",
        text: "You want to change the status.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Check if data is not 0 or not empty (depending on what data represents)
            if (data == 0 || data == "") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Firstly Add Data",
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(function () {
                    window.location.reload();
                }, 4000);

            } else {
                // Proceed with the status change
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "User/ChangeStatus",
                    data: {
                        status: status,
                        key: key
                    },
                    success: function (response) {
                        if (response == 1) {
                            Swal.fire({
                                title: "Success!",
                                text: "Status Change Successfully!",
                                icon: "success",
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Invalid Id and Password",
                            });
                        }
                    }
                });
            }
        }
    });
}


function change_dashboard_status(val, key, data) {

    var checkboxValue = val.checked;
    if (checkboxValue == true) {
        var status = 1;
    } else {
        var status = 0;
    }
    if (data == 0 || data == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Firstly Add Data Except 0",
            showCancelButton: false,
            showConfirmButton: false
        });
        setTimeout(function () {
            window.location.reload();
        }, 4000);
    } else {
        $.ajax({
            type: "POST",
            url: base_url + '/UserDashboard/change_dashboard_status',
            data: {
                status: status,
                key: key
            },
            success: function (response) {
                if (response == 1) {
                    Swal.fire({
                        title: "Success!",
                        text: " Status Change Successfully!",
                        icon: "success",
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something Went Wrong",
                    });
                }


            }
        });
    }
}
function onlyNumbers(event) {
    var charCode = event.which || event.keyCode;
    if ((charCode >= 48 && charCode <= 57)) { // ASCII codes for numbers 0 to 9
        return true;
    } else {
        return false;
    }
}


function onlytxtuplodeimg(data) {

    var myFile = data.value;
    var upld = myFile.split('.').pop().toLowerCase();

    if (upld === 'pdf') {
        var fileSize = data.files[0].size; // Get file size in bytes
        var maxSize = 1024 * 1024; // 1MB

        if (fileSize <= maxSize) {
            $('.' + data.id + '_error').html('');
            return true;
        } else {
            $("#" + data.id).val(""); // Clear the file input field
            $('.' + data.id + '_error').html('File size exceeds the limit of 1MB.');
            return false;
        }
    } else {
        $("#" + data.id).val(""); // Clear the file input field
        $('.' + data.id + '_error').html('Only PDF files are allowed.');
        return false;
    }
}
function image_validate(data, btn) {

    var myFile = data.value;
    var upld = myFile.split('.').pop().toLowerCase();

    if (upld === 'jpg' || upld === 'png' || upld === 'jpeg') {
        var fileSize = data.files[0].size; // Get file size in bytes
        var maxSize = 1024 * 1024; // 1MB

        if (fileSize <= maxSize) {
            $('.' + data.id + '_error').html('');
            $("#" + btn).prop("disabled", false);
            return true;
        } else {
            $("#" + data.id).val(""); // Clear the file input field
            $('.' + data.id + '_error').html('File size exceeds the limit of 1MB.');
            $("#" + btn).prop("disabled", true);
            return false;
        }
    } else {
        $("#" + data.id).val(""); // Clear the file input field
        $('.' + data.id + '_error').html('Only jpg,png,jpeg files are allowed.');
        $("#" + btn).prop("disabled", true);
        return false;
    }
}
function checkPDFAvailability() {
    $.ajax({
        url: BASE_URL + "User/check_pdf_availability",
        type: "GET",
        success: function (response) {
            if (response == 1) {
                $('#user_cv').prop('required', false);
            } else {
                //$('#user_cv').prop('required', true);
            }
        },
    });
}

// function daysDifference(index) {
//     const fromDateElement = document.getElementById(`from_date${index}`);
//     const toDateElement = document.getElementById(`to_date${index}`);
//     const resultElement = document.getElementById(`result${index}`);

//     const fromDate = fromDateElement.value;
//     const toDate = toDateElement.value;

//     if (fromDate && toDate) {
//         const from = new Date(fromDate);
//         const to = new Date(toDate);

//         let fromYear = from.getFullYear();
//         let fromMonth = from.getMonth();
//         let toYear = to.getFullYear();
//         let toMonth = to.getMonth();

//         let monthDiff = (toYear * 12 + toMonth) - (fromYear * 12 + fromMonth);

//         const diffYears = Math.floor(monthDiff / 12);
//         const remainingMonths = monthDiff % 12;

//         resultElement.value = `${remainingMonths} months : ${diffYears} years`;
//     } else {
//         resultElement.value = '';
//     }
// }
function daysDifference(index) {
    const fromDateElement = document.getElementById(`from_date${index}`);
    const toDateElement = document.getElementById(`to_date${index}`);
    const resultElement = document.getElementById(`result${index}`);

    const fromDate = fromDateElement.value;
    const toDate = toDateElement.value;

    if (fromDate && toDate) {
        const from = new Date(fromDate);
        const to = new Date(toDate);

        if (from > to) {
            alert('From date cannot be greater than To date');
        } else {
            let fromYear = from.getFullYear();
            let fromMonth = from.getMonth();
            let toYear = to.getFullYear();
            let toMonth = to.getMonth();

            let monthDiff = (toYear * 12 + toMonth) - (fromYear * 12 + fromMonth);

            const diffYears = Math.floor(monthDiff / 12);
            const remainingMonths = monthDiff % 12;

            resultElement.value = `${remainingMonths} months : ${diffYears} years`;
        }
    } else {
        resultElement.value = '';
    }
}

function initializeDates() {
    const elements = document.querySelectorAll('[id^="from_date"], [id^="to_date"]');
    elements.forEach((element) => {
        const index = element.id.replace(/\D/g, '');
        daysDifference(index);
    });
}

window.onload = initializeDates;


$(document).ready(function () {

   

    var i = 0;
    $("#add-class-experience").click(function () {

        var group = `<div class="items"><div class="row item-content"><div class="col-md-12 mb-3"><label for="work_type" class="form-label">Enter Work Type<span class="text-danger">*</span></label><input type="text" class="form-control" name="work_type[]" placeholder="Example : Web Developer" ></div><div class="col-md-12 mb-3"><label for="organisation_name" class="form-label">Enter Organisation Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="organisation_name[]" placeholder="Enter Your Organisation Name" ></div><div class="col-md-12 mb-3"><label for="website_url" class="form-label">Enter Organisation Website URL <span class="text-danger">*</span></label><input type="url" class="form-control" name="website_url[]" placeholder="Enter Your Organisation Website URL" ></div><div class="col-md-6 mb-3"><label for="work_from" onchange="daysDifference(${i})" class="form-label">Work From<span class="text-danger">*</span></label><input class="form-control" name="work_from[]"max="` + currentYearMonth + `"  type="month" id="from_date${i}" ></div><div class="col-md-6 mb-3"><label for="work_to" class="form-label">Work To<span class="text-danger">*</span> (Choose Current Month for Till Now)</label><input class="form-control" name="work_to[]"max="` + currentYearMonth + `"  type="month" id="to_date${i}" onchange="daysDifference(${i})" placeholder="Till Now" ></div></div><div class="col-md-12 mb-3">
                                            <label for="total-exp" class="form-label">Total Experience<span class="text-danger">*</span></label>
                                            <input class="form-control"  type="text" id="result${i}" name="total[]"   readonly>
                                        </div><div class="row mt-3"><div class="col-md-6 repeater-remove-btn"><button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Colloum"><i class="bx bx-x"></i></button></div></div><hr></div>`;
        $(this).closest('form').find('.append-area').append(group);
        i--;
    });
    $("#add-class-skills").click(function () {
        var group = `<div class="items"><div class="row item-content">
        <div class="col-md-12 mb-3"><label for="skill" class="form-label">Enter Your Skill<span class="text-danger">*</span></label><input type="text" name="skill[]" class="form-control" placeholder="Example : Java" ></div><div class="col-md-12 mb-3"><label for="percantage" class="form-label">Mark in Percentage (%)<span class="text-danger">*</span></label><select class="form-control"  name="percantage[]"><option value="0">0%</option><option value="10">10%</option><option value="20">20%</option><option value="30">30%</option><option value="40">40%</option><option value="50">50%</option><option value="60">60%</option><option value="70">70%</option><option value="80">80%</option><option value="90">90%</option><option value="100">100%</option></select></div></div><div class="row mt-3 mb-3"><div class="col-md-6 repeater-remove-btn"><button class="btn btn-outline-danger remove-btn px-4" onclick="removeInputGroup(this)" title="Remove Colloum"><i class="bx bx-x"></i></button></div></div><hr></div>`;
        $(this).closest('form').find('.append-area').append(group);
    });
    

    $('#submit_skill').on('click', function (event) {
        event.preventDefault();
        // alert('hu');
        $.ajax({
            url: BASE_URL + "UserDashboard/save_skills",
            type: 'POST',
            data: $('#skill_form').serialize(),
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
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    $('#submit_experience').on('click', function () {
        event.preventDefault();

        $.ajax({
            url: BASE_URL + "UserDashboard/save_experience",
            type: 'POST',
            data: $('#experience_form').serialize(),
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



    //end 
});
function editprojectmodal(id) {
    $('#editProject').modal('show');
   
}
function editChangeproject(id) {
    editprojectmodal(id);
    $.ajax({
        url: BASE_URL + "UserDashboard/get_single_project",
        type: "POST",
        dataType: 'json',
        data: { id: id },
        success: function (response) {
            if (response) {
                console.log(response);
                var img = BASE_URL + "assets/upload/Project_Image/" + response.faeture_image;
                $('#add_project_id').val(response.id);
                $('#project_name').val(response.project_name);
                $('#project_url').val(response.project_url);
                $('#working_role').val(response.working_role);
                $('#project_image').attr('src', img);
               $('#project_description').val(response.description);
               // editProjectQuill.root.innerHTML = response.description;
             // console.log(response.description);
            }
        }
    });

}
function remove_db_data(id, tbl) {
    Swal.fire({
        title: 'Are you sure?',
        text: "want to delete this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + 'UserDashboard/delete_data',
                type: "POST",
                data: { id: id, tbl: tbl },
                success: function (response) {
                    if (response == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Data deleted successfully!",
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops..",
                            text: "Unable to delete data!",
                        });
                    }
                }
            });
        }
    });
}

function add_preview(image, imageId, spanId, buttonId, img_height, img_width) {
    // alert(spanId);
    var filePath = image.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.jpeg )$/i;

    if (!allowedExtensions.exec(filePath)) {

        document.getElementById(spanId).innerHTML = '\n Please upload file having extensions .jpg, .png, .jpeg only.';
        document.getElementById(buttonId).disabled = true;
    } else {
        // Image preview
        if (image.files && image.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image();
                img.onload = function () {
                    var width = this.width;
                    var height = this.height;
                    // Check image dimensions
                    if (width > img_height || height > img_width) {
                        //  alert(spanId);
                        document.getElementById(spanId).innerHTML = "Image dimensions should be less than or equal to " + img_height + "x" + img_width + ".";
                        document.getElementById(buttonId).disabled = true;
                        return false;
                    }
                    $('.image2')
                        .attr('src', e.target.result)
                        .width(110)
                        .height(70);
                    document.getElementById(spanId).innerHTML = "";
                    document.getElementById(buttonId).disabled = false;
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(image.files[0]);
        }
    }
}

function removeInputGroup(btn) {
    
    $(btn).closest('.items').remove();
}