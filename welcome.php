<?php
session_start();
if(isset($_SESSION['user_id'])){
    $message =  "Welcome ".$_SESSION['username'];
    $user_id = $_SESSION['user_id'];
}else{
    header('Location: login.php');
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
    <link rel="stylesheet" href="fontawesome/css/all.css" type="text/css">
    <link rel="stylesheet" href="js/datetimepicker/datetimepicker.css" type="text/css">
</head>

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
    <div class="row m-0 ">
        <div class="col-md-4 pt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class='table table-bordered'>
                            <thead>
                                <tr><td>Name : <strong id="userName"></strong></td></tr>
                                <tr><td>Email : <strong id="email"></strong></td></tr>
                                <tr><td>Mobile Number : <strong id="Mobile_Number"></strong></td></tr>
                                <tr><td>DOB : <strong id="DOB"></strong></td></tr>
                                <tr><td>Address : <strong id="Address"></strong></td></tr>
                                <tr><td>City : <strong id="City"></strong></td></tr>
                                <tr><td>State : <strong id="State"></strong></td></tr>
                                <tr><td>Country : <strong id="Country"></strong></td></tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 pt-3">
            <div class="card">
                <div class="card-header">
                    <h4>User Info</h4>
                </div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary mb-2" href="index.php" style="float:right">Register New User</a>
                    <div class="table-responsive" id="otherUserInfoTable">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Mobile Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="otherUserInfo">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datetimepicker/datetimepicker.js"></script>
<script type="text/javascript" src="app/info.js"></script>
<script>
    getInfo(<?php echo $user_id;?>);
</script>
</html>