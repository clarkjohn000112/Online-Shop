<?php include ('../partials/menu.php');


$id = $_GET['id'];

$sql = "DELETE FROM admin where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    $_SESSION['delete-success']="<div class='error'> admin successfully deleted</div>";
    header("location:".SITEURL.'/register/adminmanage.php');
}
else{
    $_SESSION['delete-failed']="<div class='error'> admin failed to delete</div>";
    header("location:".SITEURL.'/register/adminmanage.php');
}
?>