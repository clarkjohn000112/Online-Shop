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
      FULLNAME:
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
      <input type="submit" name="submit" value="Update Admin" class="btn btn-primary">
     
  </td></tr>

</table>
</form>
<?php include ('../partials/footer.php')?>

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
    $_SESSION['update-success']="<div class='error'> admin successfully updated</div>";
  header("location:".SITEURL.'/register/adminmanage.php');
}
else{
    $_SESSION['update-failed']="<div class='error'> failed to update admin</div>";
  header("location:".SITEURL.'/register/adminmanage.php');
}

}


?>
	


	    
       
	    	
	    </div>
	</div>
</div>
	

</body>
</html>