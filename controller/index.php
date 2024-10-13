<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            // Check if the file was uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image']['name'];
                $target_path = "uploads/" . basename($image);

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                    // File successfully uploaded, proceed with the database insertion
                    $db->action("INSERT INTO student (name, email, phone, image) VALUES ('$name', '$email', '$phone', '$target_path')");
                    header("Location:index.php?controller=student");
                    exit();
                } else {
                    $error = "Failed to upload image.";
                }
            } else {
                $error = "Image not uploaded or an error occurred.";
            }

            // Validate other fields
            if (empty($name) || empty($email) || empty($phone)) {
                $error = "Please check your information.";
            }
        }
        require_once 'view/add.php';
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            foreach ($db->getData("SELECT * FROM student WHERE id ='$id'") as $row) {
                $name = isset($row["name"]) ? $row["name"] : "";
                $email = isset($row["email"]) ? $row["email"] : "";
                $phone = isset($row["phone"]) ? $row["phone"] : "";
                $image = isset($row["image"]) ? $row["image"] : "";
            }

            if (isset($_POST['submit'])) {
                $new_name = $_POST['name']; 
                $new_email = $_POST['email']; 
                $new_phone = $_POST['phone']; 

                // Check if a new image was uploaded
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $new_image = $_FILES['image']['name'];
                    $target_path = "uploads/" . basename($new_image);

                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                        // Use new image path for the update
                        $db->action("UPDATE student SET name = '$new_name', email = '$new_email', phone = '$new_phone', image = '$target_path' WHERE id ='$id'");
                        header("Location:index.php?controller=student");
                        exit();
                    } else {
                        $error = "Failed to upload new image.";
                    }
                } else {
                    // If no new image is uploaded, keep the old image
                    $new_image = $image; // Use the existing image
                    $db->action("UPDATE student SET name = '$new_name', email = '$new_email', phone = '$new_phone', image = '$new_image' WHERE id ='$id'");
                    header("Location:index.php?controller=student");
                    exit();
                }

                // Validate other fields
                if (empty($new_name) || empty($new_email) || empty($new_phone)) {
                    $error = "Please check your information.";
                }
            }
        }
        require_once 'view/edit.php'; 
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $id= $_GET['id'];
            $db->action("DELETE FROM student WHERE id = '$id'");
            header("Location:index.php?controller=student");
        }
        break;

    default:
        $search = isset($_GET['search']) ? $_GET['search'] : '';
    
        if ($search) {
            $data = $db->getData("SELECT * FROM student WHERE name LIKE '%$search%' OR email LIKE '%$search%'");
        } else {
            $data = $db->getData("SELECT * FROM student");
        }
        
        if (!is_array($data)) {
            $data = [];
        }
        
        require_once 'view/index.php';
        break;
}
