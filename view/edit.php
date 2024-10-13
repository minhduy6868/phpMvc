<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit</title>
    <style>
        #imagePreview {
            display: none;
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                Something went wrong with your request!
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" value="<?= htmlspecialchars($email) ?>" type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" value="<?= htmlspecialchars($name) ?>" type="text" class="form-control" id="inputName" placeholder="Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input name="phone" value="<?= htmlspecialchars($phone) ?>" type="tel" class="form-control" id="inputPhone" placeholder="099-999-999" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <img id="imagePreview" src="<?= htmlspecialchars($image) ?>" alt="Image Preview" />
                    <input name="image" type="file" class="form-control" id="inputImage" accept="image/*">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button name="submit" value="Edit" type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('inputImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the new image source
                    preview.style.display = 'block'; // Show the new image preview
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none'; // Hide preview if no file is selected
            }
        });

        // If there is a current image, display it initially
        document.addEventListener('DOMContentLoaded', function() {
            const currentImage = document.getElementById('imagePreview');
            if (currentImage.src) {
                currentImage.style.display = 'block'; // Show the current image if it exists
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
