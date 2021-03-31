<?php
session_start();
$message = '';
if(isset($_SESSION['user_id'])){
    // $message =  "Welcome ".$_SESSION['username'];
    // $user_id = $_SESSION['user_id'];
}else{
    header('Location: login.php');
}
if(isset($_SESSION['error'])){
    if($_SESSION['error']){
        $message =  $_SESSION['message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Use Management</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="js/datetimepicker/datetimepicker.css" type="text/css">
</head>
<style>
    .messageDiv{
        border:1px solid red;
        color:red;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-md">
            <a class="navbar-brand" href="#">Management</a>
        </div>
        <ul class="nav " style="position: absolute;right: 0px;left: auton;">
            <li class="nav-item">
                <a class="nav-link" href="api/logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Register Form</h4>
            </div>
            <div class="card-body">
                <?php
                    if(strlen($message) > 0){
                        echo "<div class='p-2 messageDiv'>".$message."</div>";
                    }
                ?>
                <form action="api/registerUserAPI.php" method="post" enctype="multipart/form-data" onsubmit="return registerUser(event)">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control validateIT" type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">username</label>
                                <input class="form-control validateIT" type="text" name="username" id="username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="EmailID">Email ID</label>
                                <input class="form-control validateIT" type="email" name="EmailID" id="EmailID">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input class="form-control validateIT" type="password" name="Password" id="Password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ConfirmPassword">Confirm Password</label>
                                <input class="form-control validateIT" type="password" name="ConfirmPassword" id="ConfirmPassword">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="MobileNumber">Mobile Number</label>
                                <input class="form-control validateIT" type="text" name="MobileNumber" id="MobileNumber">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="DOB">DOB</label>
                                <input class="form-control validateIT datepicker" type="text" name="DOB" id="DOB">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <input class="form-control validateIT" type="text" name="Address" id="Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="City ">City </label>
                                <input class="form-control validateIT" type="text" name="City " id="City ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="State">State</label>
                                <input class="form-control validateIT" type="text" name="State" id="State">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Country">Country</label>
                                <input class="form-control validateIT" type="text" name="Country" id="Country">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="profileImage" id="profileImage">
                                <label class="custom-file-label" for="profileImage">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datetimepicker/datetimepicker.js"></script>
<script type="text/javascript" src="app/registerUser.js"></script>

</html>