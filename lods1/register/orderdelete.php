<?php include ('../partials/menu.php');


$id = $_GET['id'];

$sql = "DELETE FROM checkout where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    $_SESSION['delete-success']="<div class='error'>order successfully deleted</div>";
    header("location:".SITEURL.'/register/ordermanage.php');
}
else{
    $_SESSION['delete-failed']="<div class='error'>order failed to delete</div>";
    header("location:".SITEURL.'/register/ordermanage.php');
}

?>