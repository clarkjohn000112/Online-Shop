<?php include('partials/menu.php');?>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="container">

    <br>
    <h1>Add Admin</h1>
    <br>
    <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
                 unset($_SESSION['add']);
			 } 
	   ?>
    <form action="" method="POST">
            <table class="table-admin">
				<tr>
					<td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
					<td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
					<td>Password:</td>
                    <td><input type="text" name="password" placeholder="Enter your password"></td>
				</tr>
			</table>
            <input type="submit" name="submit"  value="Add Admin" class="btn-secondary">
    </form>

</div>
<?php include('partials/footer.php')?>

<?php
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql1= "SELECT * FROM admin where name='$full_name' and username = '$username' and password = '$password'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "ADMIN ALREADY EXIST";
            header("location:".SITEURL.'/admin/add-admin.php');
        }
        else
        {
            $sql = "INSERT into admin set name='$full_name', username='$username', password='$password'";
      
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                echo "DATA INSERTED";
                $_SESSION['add'] = "DATA INSERTED";
                header("location:".SITEURL.'/manage-admin.php');
            }
            else{
                $_SESSION['add'] = "FAILED TO INSERT";
                header("location:".SITEURL.'/add-admin.php');
            }
        }
    }
    
?>