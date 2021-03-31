<?php 
include 'connection.php';
session_start();
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $checkforDub = $conn->prepare("SELECT id,name,password FROM users WHERE username='$username' ");
    $checkforDub->execute();
    $result = $checkforDub->rowCount();
    // var_dump($result);die();
    if($result > 0){
        $_SESSION['error'] = true;
        $_SESSION['message'] = "Username is in use";
        header("Location: ../index.php");
        die();
    }
}
if(!empty($_POST['name'])){
    try {
        if(!empty($_FILES["profileImage"]["name"])){
            $target_dir = "uploads/";
            $target_file = $target_dir . $_POST['username']."_".basename($_FILES["profileImage"]["name"]);
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                $stmtpp = $conn->prepare("INSERT INTO profile_pic (location)
                        VALUES (:location)");
                $stmtpp->bindParam(':location', $target_file);
                $stmtpp->execute();
                $pic_id = $conn->lastInsertId();
                // die();
            } else {
                echo "Sorry, there was an error uploading your file.";
                die();
            }
        }else{
            $pic_id = 0;
        }
        
        $pass = md5($_POST['Password']);
        $stmt = $conn->prepare("INSERT INTO users (name, username,email,password,Mobile_Number,DOB,Address,City
        ,State,Country,pic_id)
            VALUES (:name, :username, :email,:Password,:MobileNumber,:DOB,:Address,:City
            ,:State,:Country,:pic_id)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':email', $_POST['EmailID']);
        $stmt->bindParam(':Password',$pass);
        $stmt->bindParam(':MobileNumber', $_POST['MobileNumber']);
        $stmt->bindParam(':DOB', $_POST['DOB']);
        $stmt->bindParam(':Address', $_POST['Address']);
        $stmt->bindParam(':City', $_POST['City']);
        $stmt->bindParam(':State', $_POST['State']);
        $stmt->bindParam(':Country', $_POST['Country']);
        $stmt->bindParam(':pic_id', $pic_id);
        // use exec() because no results are returned
        $stmt->execute();
        header("Location: ../");
        die();
      } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
      }
}
