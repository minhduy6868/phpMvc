<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Student</title>
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
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Number Phone</label>
                <div class="col-sm-10">
                    <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="099-999-999" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <label for="inputImage" class="custom-file-upload">
                        Choose Image
                    </label>
                    <input name="image" type="file" class="form-control" id="inputImage" accept="image/*" required style="display: none;">
                    <img id="imagePreviewNew" alt="Image Preview" /> <!-- Preview image for new uploads -->
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button name="submit" value="Add" type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    // Chọn phần tử input file
    const inputFile = document.getElementById('inputImage');
    const preview = document.getElementById('imagePreviewNew');

    inputFile.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Đặt nguồn hình ảnh thành tệp đã chọn
                preview.style.display = 'block'; // Hiện ảnh xem trước
            }
            reader.readAsDataURL(file); // Đọc tệp dưới dạng URL dữ liệu
        } else {
            preview.style.display = 'none'; // Ẩn xem trước nếu không có tệp nào được chọn
        }
    });

    // Kích hoạt input file khi label được nhấn
    document.querySelector('.custom-file-upload').addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định
        inputFile.click(); // Kích hoạt input file
    });
</script>

</body>
</html>
