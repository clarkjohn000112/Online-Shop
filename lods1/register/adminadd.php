<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			  $(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>
<body>

<div class="wrapper">

	<div class="top_navbar">
		<div class="logo">
			<a href="index.html">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				
			</div>
		
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
	        	<ul>
		          <li>
		            <a href="adminmanage.php"  class="active">
		              <span class="icon">
		              <span class="list">Admin</span>
		            </a>
		          </li>
		          <li>
		            <a href="brandmanage.php">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="itemmanage.php">
		              <span class="list">Items</span>
		            </a>
		          </li>

                  <li>
		            <a href="ordermanage.php" >
		             
		              <span class="list">Order</span>
		            </a>
		          </li>
		         
		        </ul>

		        <div class="hamburger">
			        <div class="inner_hamburger">
			            <span class="arrow">
			                <i class="fas fa-long-arrow-alt-left"></i>
			                <i class="fas fa-long-arrow-alt-right"></i>
			            </span>
			        </div>
			    </div>

	        </div>
	    </div>
<br>
	    <div class="container">
        <?php include ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css">
        


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
		<br>
        <input type="submit" name="submit"  value="Add Admin" class="btn btn-primary12">
</form>


<?php include ('../partials/footer.php')?>

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
        header("location:".SITEURL.'/register/adminmanage.php');
    }
    else
    {
        $sql = "INSERT into admin set name='$full_name', username='$username', password='$password'";
  
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
            $_SESSION['add-success']="<div class='error'>admin successfully added</div>";
            header("location:".SITEURL.'/register/adminmanage.php');
        }
        else{
            $_SESSION['add-failed']="<div class='error'>admin failed to add</div>";
            header("location:".SITEURL.'/register/adminadd.php');
        }
    }
}

?>

</div>

   
	    	
	    </div>
	</div>
</div>
	

</body>
</html>