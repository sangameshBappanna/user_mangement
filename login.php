<?php
    session_start();  
    session_destroy();  
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

<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control validateIT" type="text" name="username" id="username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Password">Name</label>
                            <input class="form-control validateIT" type="password" name="Password" id="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-block btn-primary" type="button" onclick="loginFun()">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datetimepicker/datetimepicker.js"></script>
<script>
    function loginFun() {
        var is_valid = true;
        $('.validateIT').each(function() {
            $(this).removeClass('is-invalid');
            if ($(this).val().length == 0) {
                $(this).addClass('is-invalid');
                is_valid = false;
            }
        });
        if (is_valid) {
            $.ajax({
                /* the route pointing to the post function */
                url: 'api/login.php',
                type: 'POST',
                async: false,
                /* send the csrf-token and the input to the controller */
                data: {
                    'Password': $('#Password').val(),
                    'username': $('#username').val(),
                },
                dataType: 'JSON',
                /* remind that 'response' is the response of the AjaxController */
                success: function(response) {
                    if (response.result) {
                        window.location.href = 'welcome.php';
                    } else {
                        alert(response.message);
                    }
                },
                error: function(result) {
                    //console.log(result);
                    console.log('Failed to connect!!!!!!');

                }
            });
        }
    }
</script>

</html>