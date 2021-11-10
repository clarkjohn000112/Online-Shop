<?php include ('partials/menu.php')?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM admin where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    echo "ADMIN DELETED";
      header("location:".SITEURL.'/manage-admin.php');
}
else{
    echo "ADMIN FAILED TO DELETE";
}
?>