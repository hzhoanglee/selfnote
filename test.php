<?php
/*
    Part: Includes from database
*/
require ("scripts/db.php");
require ("scripts/function.php");
/*
    Part: Check credentials from Database
*/
print_r($_POST);
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
            echo $cookie_value;
            setcookie($username, $cookie_value, time() + (86400 * 365), "/");
            $query = "INSERT INTO sessions (id, user, token)
            VALUES (NULL, '$username', '$cookie_value')";
            $result = $db->query($query);
            //echo "<script>window.location='https://selfnotes/categoryerror/".$db->error."';</script>";
            echo $db->error;
        }

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