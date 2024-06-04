<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Cropping and Saving</title>
</head>
<body>
<!-- HTML for image cropping -->
<div id="cropper-container">
    <img id="image-to-crop" src="<?=base_url()?>assets/upload/User_Images/woman-1509956_1280.jpg" alt="Image to Crop">
</div>
<button id="crop-button">Crop and Save</button>

<script>
document.getElementById('crop-button').addEventListener('click', function() {
    // Get the cropped image data URL
    var croppedImageData = cropImage();
    // Create an anchor element
    var downloadLink = document.createElement('a');
    // Set attributes for downloading
    downloadLink.href = croppedImageData;
    downloadLink.download = 'cropped_image.png';
    // Trigger click event to prompt download
    downloadLink.click();
});

function cropImage() {
    // Here, implement your image cropping logic using a library like Croppie, Cropper.js, or HTML canvas
    // For demonstration purposes, I'll just return a sample data URL
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');
    canvas.width = 100; // Set width
    canvas.height = 100; // Set height
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // Draw a sample cropped image (here, I'm just drawing a square)
    ctx.drawImage(document.getElementById('image-to-crop'), 0, 0, 100, 100, 0, 0, 100, 100);
    // Convert canvas to data URL
    return canvas.toDataURL();
}
</script>
</body>
</html>
