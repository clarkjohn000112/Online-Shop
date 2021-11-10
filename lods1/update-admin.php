<?php include ('partials/menu.php')?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
  
        <br>
       
        <?php 
           
                 $id=$_GET['id'];
                    $sql="SELECT * from admin  WHERE id=$id";
        
                    $res=mysqli_query($conn, $sql);
        
                    if($res==TRUE){
                        $count = mysqli_num_rows($res);
                        if($count==1){
                            $row=mysqli_fetch_assoc($res);
                            $full_name= $row['name'];
                            $username= $row['username'];
        
                        }
                        else{
                            header("location:".SITEURL.'/admin/manage-admin.php');
                        }
        
                    }
                
           
        ?>

    <form action="" method="POST">
        <table><tr><td>
            Full Name:
        </td>
        <td>
            <input type="text" name="full_name" value="<?php echo $full_name?>">
        </td></tr>
        <tr><td>
           USERNAME:
        </td>
        <td>
            <input type="text" name="username" value="<?php echo $username?>">
        </td></tr>
        <tr><td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
           
        </td></tr>

    </table>
    </form>
    </div>


<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE admin SET
    name='$full_name',
    username='$username'
    WHERE id='$id' ";

    $res=mysqli_query($conn, $sql);
    if($res==TRUE){
        echo "Updated";
        header("location:".SITEURL.'/admin/manage-admin.php');
    }
    else{
        echo "failed";
        header("location:".SITEURL.'/admin/manage-admin.php');
    }
   
}


?>

<?php include ('partials/footer.php')?>
