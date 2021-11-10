<?php include ('../partials/menu.php')?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM brand where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    $_SESSION['delete-success']="<div class='error'> brand successfully deleted</div>";
     header("location:".SITEURL.'/register/brandmanage.php');
}
else{
    $_SESSION['delete-failed']="<div class='error'> brand failed to delete</div>";
     header("location:".SITEURL.'/register/brandmanage.php');
}
?>