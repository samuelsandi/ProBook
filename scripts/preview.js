function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output_image');
        output.src = reader.result;
        var up = document.getElementById('imageup');
        
        document.getElementById('imagename').value = up.value.split(/(\\|\/)/g).pop();
    }
    reader.readAsDataURL(event.target.files[0]);
}