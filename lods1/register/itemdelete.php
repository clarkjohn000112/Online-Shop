<?php include ('../partials/menu.php');


$id = $_GET['id'];

$sql = "DELETE FROM item where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    $_SESSION['delete-success']="<div class='error'>item successfully deleted</div>";
    header("location:".SITEURL.'/register/itemmanage.php');
}
else{
    $_SESSION['add-failed']="<div class='error'>item failed to delete</div>";
    header("location:".SITEURL.'/register/itemmanage.php');
}

?>