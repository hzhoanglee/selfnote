<?php
//logout process destroy the loged in session
session_start();
session_unset();
session_destroy();
ob_start();
echo "<script>window.location='index.php';</script>";
?>