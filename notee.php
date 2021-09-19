<?php
/*
    Part: Call dependencies
*/
require("scripts/autoload.php");
checkauth();

/*
    Part: Call header
*/
include("includes/header.php");
/*
    Part: Call main page
*/
switch ($_GET["act"]){
    case "view":
        echo "<title>View</title>";
        include ("includes/note/view.php");
        break;
    case "edit":
        echo "<title>Edit: ". getNoteName($_GET["id"],"name")."</title>";
        include ("includes/note/edit.php");
        break;
    case "storeEdit":
        updateNote($_POST["id"], $_POST["name"], $_POST["content"], $_POST["category"], $_POST["tags"]);
        break;
    case "storeRealtime":
        updateNoteRealtime($_POST["id"], $_POST["content"]);
        break;
    case "delete":
        echo "<title>Delete: ". getNoteName($_GET["id"],"name")."</title>";
        include ("includes/note/delete.php");
        break;
    case "storeDelete":
        if($_POST["confirm"] == 1){
            deleteNote($_POST["id"]);
        } else {
            echo '<script>window.location.replace("/cat.php?act=list");</script>';
        }
        break;
    case "new":
        echo "<title>New Note</title>";
        include ("includes/note/new.php");
        break;
    case "storeNew":
        newNote($_POST["name"], $_POST["content"], $_POST["category"], $_POST["tags"]);
        break;
    default:
        include ("includes/note/list.php");
}
/*
    Part: Call footer
*/
include ("includes/footer.php");
?>
    <!-- Datatable -->
    <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/plugins-init/datatables.init.js"></script>
<?php
/*
    Part: Check error to print
*/
if (isset($_GET["error"])){

    echo '
<link rel="stylesheet" href="/assets/vendor/toastr/css/toastr.min.css">
<script src="/assets/vendor/toastr/js/toastr.min.js"></script>
<script>
    function error () {
        toastr.error("' . $_GET["error"] .'", "Error", {
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
echo '<!-- Summernote -->
<script src="/assets/vendor/summernote/js/summernote.min.js"></script>
<!-- Summernote init -->
<script src="/assets/js/plugins-init/summernote-init.js"></script>';
if ($_GET["act"] == "edit"){
    echo '<script src="/assets/js/plugins-init/edit-init.js"></script>';
}?>

