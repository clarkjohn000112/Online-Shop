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
			
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
	        	<ul>
		          <li>
		            <a href="adminmanage.php" >
		              <span class="icon">
		              <span class="list">Admin</span>
		            </a>
		          </li>
		          <li>
		            <a href="brandmanage.php"  class="active">
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
           if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql="SELECT * from BRAND WHERE id=$id";
        
                    $res=mysqli_query($conn, $sql);
        
                    if($res==TRUE){
                        $count = mysqli_num_rows($res);
                        if($count==1){
                            $row=mysqli_fetch_assoc($res);
                            $title= $row['title'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                        }
                        else{
                            header("location:".SITEURL.'/register/brandmanage.php');
                        }
        
                    }
                }
           
        ?>

    <form action="" method="POST" enctype="multipart/form-data">
			<table>
           
				<tr>
					<th>Title: </th>
					<td>
                        <input type="text" name="title" value="<?php echo $title?>"required>
                    </td>
				</tr>
                <tr>
					<th>Brand Logo: </th>
					<td>
                        <input type="file" name="photo" required>
                    </td>
				</tr>
                <tr>
					<th>Featured: </th>
					<td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
				</tr>
                <tr>
					<th>Live: </th>
					<td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No</td>
				</tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </td>
                </tr>
                
			</table>
</form>
<?php include ('../partials/footer.php')?>
  
</div>

<?php

if(isset($_POST['submit']))
{
 $id =$_POST['id'];
 $title=$_POST['title'];
 $featured=$_POST['featured'];
 $active=$_POST['active'];

 $fileinfo=PATHINFO($_FILES["photo"]["name"]);

 if(empty($fileinfo['filename'])){
 $location="";
 }
 else{
 $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
 move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $newFilename);
 $location="../images/" . $newFilename;
 }


 $sql2 = "UPDATE brand set
 title='$title',
 images_name='$location',
 featured='$featured',
 active='$active'
 where id=$id";

$res2=mysqli_query($conn,$sql2);

if($res2==TRUE){
    $_SESSION['update-success']="<div class='error'> brand successfully updated</div>";
    header("location:".SITEURL.'/register/brandmanage.php');
}
else{
    $_SESSION['update-failed']="<div class='error'> brand failed to delete</div>";
    header("location:".SITEURL.'/register/brandmanage.php');
}
}


?>

</div>


	</div>
</div>
	

</body>
</html>