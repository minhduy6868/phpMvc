<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Giang Vien</title>
    <style>
        #imagePreview {
            display: none;
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border: 2px solid #007bff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputHoten" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input name="hoten" value="<?= htmlspecialchars($hoten) ?>" type="text" class="form-control" id="inputHoten" placeholder="Họ Tên" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTongsolop" class="col-sm-2 col-form-label">Tổng Số Lớp</label>
                <div class="col-sm-10">
                    <input name="tongsolop" value="<?= htmlspecialchars($tongsolop) ?>" type="text" class="form-control" id="inputTongsolop" placeholder="Tổng Số Lớp" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHinhanh" class="col-sm-2 col-form-label">Hình Ảnh</label>
                <div class="col-sm-10">
                    <img id="imagePreview" src="<?= htmlspecialchars($hinhanh) ?>" alt="Image Preview" />
                    <input name="hinhanh" type="file" class="form-control" id="inputHinhanh" accept="image/*">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button name="submit" value="Edit" type="submit" class="btn btn-primary">Chỉnh Sửa</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('inputHinhanh').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const currentImage = document.getElementById('imagePreview');
            if (currentImage.src) {
                currentImage.style.display = 'block';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
