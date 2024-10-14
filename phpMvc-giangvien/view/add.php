<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Giang Vien</title>
    <style>
        #imagePreviewNew {
            width: 100px; /* Increased width for better visibility */
            height: 100px; /* Increased height for better visibility */
            object-fit: cover;
            border: 2px solid #007bff; /* Border for the preview */
            border-radius: 5px; /* Rounded corners */
            margin-left: 10px; /* Space between input and preview */
            display: none; /* Hidden by default */
        }
        .custom-file-upload {
            border: 1px solid #ced4da;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            background-color: #f8f9fa; /* Light background */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($error) . '</div>';
        }
        ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputHoten" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input name="hoten" type="text" class="form-control" id="inputHoten" placeholder="Họ Tên" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTongsolop" class="col-sm-2 col-form-label">Tổng Số Lớp</label>
                <div class="col-sm-10">
                    <input name="tongsolop" type="text" class="form-control" id="inputTongsolop" placeholder="Tổng Số Lớp" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHinhanh" class="col-sm-2 col-form-label">Hình Ảnh</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <label for="inputHinhanh" class="custom-file-upload">
                        Chọn Hình Ảnh
                    </label>
                    <input name="hinhanh" type="file" class="form-control" id="inputHinhanh" accept="image/*" required style="display: none;">
                    <img id="imagePreviewNew" alt="Image Preview" /> <!-- Preview image for new uploads -->
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button name="submit" value="Add" type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Handle file input for image preview
        const inputFile = document.getElementById('inputHinhanh');
        const preview = document.getElementById('imagePreviewNew');

        inputFile.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set image source to the selected file
                    preview.style.display = 'block'; // Show image preview
                }
                reader.readAsDataURL(file); // Read file as data URL
            } else {
                preview.style.display = 'none'; // Hide preview if no file is selected
            }
        });

        // Activate file input when label is clicked
        document.querySelector('.custom-file-upload').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default behavior
            inputFile.click(); // Trigger file input click
        });
    </script>
</body>
</html>
