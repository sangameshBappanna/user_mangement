<?php

include 'connection.php';
session_start();
header('Content-type: application/json');
$data = file_get_contents('php://input');
$request = json_decode($data, true);
$respons = array();
if(isset($_POST['Password']) &&
    isset($_POST['username'])){
        
        $password = md5($_POST['Password']);
        $username = $_POST['username'];

        $stmt = $conn->prepare("SELECT id,name,password FROM users WHERE username='$username' and password='$password'");
        $stmt->execute();

        $result = $stmt->rowCount();
        if($result == 0){
            $respons = array();
            $respons['result'] = false;
            $respons['message'] = "Invalid Username or Password";
            echo json_encode($respons);
            die();
        }
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v) {
            $_SESSION['username'] = $v['name'];
            $_SESSION['user_id'] = $v['id'];
            $respons['result'] = true;
        }
        
        // $respons['userid'] = $row['id'];
        // $respons['token'] = $row['token']; 
        
        
        $respons['message'] = "login successfull";
        echo json_encode($respons);
        die();   

}else{

    $respons = array();
    $respons['result'] = "fail";
    $respons['message'] = "Please send required data";
    echo json_encode($respons);
    die();
}
?>