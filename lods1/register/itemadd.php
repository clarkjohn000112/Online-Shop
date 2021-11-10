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
<?php 

if(isset($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
	$sql3 = "SELECT username from user where id=$user_id";
	$res3 = mysqli_query($conn,$sql3);
	$row3= mysqli_fetch_assoc($res3);
	$user_name = $row3['username'];
}
else
{
	header("location:".SITEURL);
}
?>

<div class="wrapper">

	<div class="top_navbar">
		<div class="logo">
		<a href="index.php?user_id=<?php echo $user_id?>">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
			<a href="index.php?user_id=<?php echo $user_id?>">
					<span class="icon"><i class="fas fa-home"></i></span>
					<span>Home</span>
				</a>
				
			</div>
			
			<div class="right_info">
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-bell"></i>
					</div>
				</div>
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-cog"></i>
					</div>
				</div>
				<div>
					<div class="home_link">
						<a href="logout.php">
							<span class="icon"></span>
							<span>Log-out Admin Account</span>
						</a>
						
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
		            <a href="adminmanage.php" >
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
		            <a href="itemmanage.php" class="active">
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

	    <div class="container">
        <?php require_once ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css">


        <h1>ITEM MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
             if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            } 
	   ?><br><br><br><br>

<form action="" method="POST" enctype="multipart/form-data">
			<table>
              			<tr>
					<th>Title: </th>
					<td>
                        <input type="text" name="title" placeholder="Title" required>
                    </td>
				</tr>
                <tr>
					<th>Image: </th>
					<td>
                        <input type="file" name="photo" required>
                    </td>
				</tr>
                <tr>
					<th>Desciption: </th>
					<td>
                        <input type="text" name="description" placeholder="Description" required>
                    </td>
				</tr>
                <tr>
					<th>Price: </th>
					<td>
                        <input type="number" name="price" placeholder="Price" min="0" required>
                    </td>
				</tr>
                <tr>
					<th>Category: </th>
					<td>
                        <select name="brand">
                       <?php
                            $sql = "SELECT * FROM brand where active='Yes'";
                            $res=mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
												if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$title=$rows['title'];
								?>
                                 <option value="<?php echo $id?>"><?php echo $title?></option>
							<?php	
							}
							}
							else{
                                ?>
								<option value="0">No Data Found</option>
                                <?php
							}
                       ?>
                       </select>
                    </td>
				</tr>
                <tr>
					<th>Display: </th>
					<td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No">No</td>
				</tr>
                <tr>
					<th>Live: </th>
					<td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No</td>
				</tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Item" class="btn btn-primary">
                    </td>
                </tr>
                
			</table>
</form>
<?php
    

    if(isset($_POST['submit']))
    {
     
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $brand=$_POST['brand'];
        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
            
        }
        else{
         $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
            
        }
        else{
        $active = "No";
        }

        $fileinfo=PATHINFO($_FILES["photo"]["name"]);

	    if(empty($fileinfo['filename'])){
		$location1="";
	    }
	    else{
	    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	    move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $newFilename);
	    $location1="../images/" . $newFilename;
	    }



        $sql1= "SELECT * FROM item where title='$title' and description = '$description' and price = '$price' and brand_id='$brand' and featured = '$featured' and active = '$active'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "ITEM ALREADY EXIST";
            echo '<script type="text/javascript">
				location.replace("itemadd.php");
			  </script>';}
        else
        {    

        $sql = "INSERT INTO item (title,images_name,description,price,brand_id,featured,active)
        values ('$title','$location1','$description',$price,'$brand','$featured','$active')";
        $res=mysqli_query($conn,$sql);
         
         if($res==TRUE){
			$_SESSION['add-success']="<div class='error'>item successfully added</div>";
            echo '<script type="text/javascript">
				location.replace("itemmanage.php");
			  </script>';
        }
        else{
			$_SESSION['add-failed']="<div class='error'>item failed to add</div>";
            echo '<script type="text/javascript">
            location.replace("itemmanage.php");
          </script>';
        }
    }}
        ?>

	    </div>
	</div>
</div>
</body>
</html>