<?php 
if(isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add':
        //logic adđ
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if(empty($name) || empty($email) || empty($phone)) {
              $error = "Please check your information";  
            } else {
               $db->action("INSERT INTO student (name, email, phone) VALUES ('$name', '$email', '$phone')");
                header("Location:index.php?controller=student");
            }

        }
        require_once 'view/add.php'; 
    break;

    case 'edit':
        //logic edit
        
        //get ra thông tin student từ id và đẩy vào edit.php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            foreach($db->getData("SELECT * FROM student WHERE id ='$id'") as $row) {
                $name = isset($row["name"]) ? $row["name"] :"";
                $email = isset($row["email"]) ? $row["email"] :"";
                $phone = isset($row["phone"]) ? $row["phone"] :"";
                
            }
            //xử lí update 

            if(isset($_POST['submit'])) {
                $new_name = $_POST['name']; 
                $new_email = $_POST['email']; 
                $new_phone = $_POST['phone']; 

                if(empty($name) || empty($email) || empty($phone)) {
                    $error = "Please check your information";  
                  } else {
                     $db->action("UPDATE student SET name = '$new_name', email = '$new_email', phone = '$new_phone' WHERE id ='$id'");
                      header("Location:index.php?controller=student");
                  }

            }
        }
        require_once 'view/edit.php'; 
    break;

    case 'delete':
        //logic delete
        if(isset($_GET['id'])) {
            $id= $_GET['id'];
            $db->action("DELETE FROM student WHERE id = '$id'");
            header("Location:index.php?controller=student");
        }
        //...
    break;


    default:
      //logic index 
       $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    if ($search) {
        $data = $db->getData("SELECT * FROM student WHERE name LIKE '%$search%' OR email LIKE '%$search%'");
    } else {
        $data = $db->getData("SELECT * FROM student");
    }
    
    if (!is_array($data)) {
        $data = []; // Đảm bảo $data luôn là mảng
    }
    
    require_once 'view/index.php';
    break;
}