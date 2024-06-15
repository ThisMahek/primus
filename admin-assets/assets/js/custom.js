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
               
                $.ajax({
                    type: "POST",
                    url: BASE_URL+"User/ChangeStatus",
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
            url: BASE_URL+'/UserDashboard/change_dashboard_status',
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

function add_preview(image, imageId, spanId, buttonId, img_height, img_width) {
    var filePath = image.value;
    var allowedExtensions = /(\.jpg|\.png|\.jpeg )$/i;

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
