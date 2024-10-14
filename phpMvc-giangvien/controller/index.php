<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add':
        if (isset($_POST['submit'])) {
            $hoten = $_POST['hoten'] ?? '';
            $tongsolop = $_POST['tongsolop'] ?? '';

            if (empty($hoten) || empty($tongsolop)) {
                $error = "Please check your information.";
            } else {
                if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == UPLOAD_ERR_OK) {
                    $hinhanh = $_FILES['hinhanh']['name'];
                    $target_path = "uploads/" . basename($hinhanh);

                    if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_path)) {
                        $db->action("INSERT INTO giangvien (hoten, tongsolop, hinhanh) VALUES ('$hoten', '$tongsolop', '$target_path')");
                        header("Location:index.php?controller=giangvien");
                        exit();
                    } else {
                        $error = "Failed to upload hinhanh.";
                    }
                } else {
                    $error = "Hinhanh not uploaded or an error occurred.";
                }
            }
        }
        require_once 'view/add.php';
        break;

    case 'edit':
        if (isset($_GET['magv'])) {
            $magv = $_GET['magv'];
            $lecturerData = $db->getData("SELECT * FROM giangvien WHERE magv ='$magv'");

            if ($lecturerData) {
                $row = $lecturerData[0];
                $hoten = $row['hoten'] ?? '';
                $tongsolop = $row['tongsolop'] ?? '';
                $hinhanh = $row['hinhanh'] ?? '';

                if (isset($_POST['submit'])) {
                    $new_hoten = $_POST['hoten'];
                    $new_tongsolop = $_POST['tongsolop'];

                    if (empty($new_hoten) || empty($new_tongsolop)) {
                        $error = "Please check your information.";
                    } else {
                        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == UPLOAD_ERR_OK) {
                            $new_hinhanh = $_FILES['hinhanh']['name'];
                            $target_path = "uploads/" . basename($new_hinhanh);

                            if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_path)) {
                                $db->action("UPDATE giangvien SET hoten = '$new_hoten', tongsolop = '$new_tongsolop', hinhanh = '$target_path' WHERE magv ='$magv'");
                                header("Location:index.php?controller=giangvien");
                                exit();
                            } else {
                                $error = "Failed to upload new hinhanh.";
                            }
                        } else {
                            $db->action("UPDATE giangvien SET hoten = '$new_hoten', tongsolop = '$new_tongsolop' WHERE magv ='$magv'");
                            header("Location:index.php?controller=giangvien");
                            exit();
                        }
                    }
                }
            } else {
                $error = "No data found for the specified lecturer.";
            }
        } else {
            $error = "Invalid request.";
        }
        require_once 'view/edit.php'; 
        break;

    case 'delete':
        if (isset($_GET['magv'])) {
            $magv = $_GET['magv'];
            $db->action("DELETE FROM giangvien WHERE magv = '$magv'");
            header("Location:index.php?controller=giangvien");
            exit();
        }
        break;

    default:
        $search = isset($_GET['search']) ? $_GET['search'] : '';
    
        if ($search) {
            $data = $db->getData("SELECT * FROM giangvien WHERE hoten LIKE '%$search%'");
        } else {
            $data = $db->getData("SELECT * FROM giangvien");
        }
        
        if (!is_array($data)) {
            $data = [];
        }
        
        require_once 'view/index.php';
        break;
}
