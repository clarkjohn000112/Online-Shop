<?php include ('partials/menu.php')?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM brand where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    echo "Category DELETED";
     header("location:".SITEURL.'/manage-brand.php');
}
else{
    echo "Category FAILED TO DELETE";
}
?>