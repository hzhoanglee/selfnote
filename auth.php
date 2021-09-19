<?php
session_start();
require ("scripts/function.php");
if (checkAuthatLogin()){
    Header("location:/");
}
?>
<?php
/*
    Part: Includes from database
*/
require ("scripts/db.php");
/*
    Part: Check credentials from Database
*/
$username = "";
$password = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5(md5($_POST['password']));
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    $num_rows = $result->num_rows;
    for ($i = 0; $i < $num_rows; $i++) {
        $row = $result->fetch_row();
    }
    mysqli_free_result($result);
    if (($username == $row[1]) && ($password == $row[2]))
    {
        $_SESSION['username'] = $username;
        if ($_POST["remember"] == "on"){
            $cookie_value = generateRandomString();
            setcookie($username, $cookie_value, time() + (86400 * 365), "/");
            $query = "INSERT INTO sessions (id, user, token)
            VALUES (NULL, '$username', '$cookie_value')";
            $result = $db->query($query);

        }
        echo "<script>window.location='/';</script>";
    } else {
        //Header("location:'https://google.com/'");
        echo '
<script>
    function error () {
        toastr.error("Wrong credentials given. Please check again", "Wrong password", {
            positionClass: "toast-top-right",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    }
    error();
</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Notex - Self Hosted Note Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link href="/assets/css/style.css" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="/assets/vendor/toastr/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                <form action="/auth" method="post">
                                    <input type="text" name="login" value="dump" hidden>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input type="text" class="form-control" placeholder="somebody" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Password</strong></label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1 text-white">
                                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1" name="remember">
                                                <label class="custom-control-label" for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <div style="text-align: center;"><p class="text-white">Powered by <a class="text-white" href="https://hzv.io">HZV.io</a></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="/assets/vendor/global/global.min.js"></script>
<script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/deznav-init.js"></script>
<!-- Toastr -->
<script src="/assets/vendor/toastr/js/toastr.min.js"></script>

</body>

</html>
