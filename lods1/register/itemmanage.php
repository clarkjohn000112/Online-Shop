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
			
			<div class="right_info">
		
				<div>
					<div class="home_link">
						<a href="../login.php">
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
		            <a href="brandmanage.php" >
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
<br>
	    <div class="container">
        <?php include ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css">




<h1>ITEM MANAGEMENT</h1><br><br><br>
<?php 
       
       if(isset($_SESSION['update-success'])) {
          echo "<span  class='msg'>" .$_SESSION['update-success']. "</span>";
           unset($_SESSION['update-success']);
       } 
     
      if(isset($_SESSION['add-success'])) {
          echo "<span  class='msg'>" .$_SESSION['add-success']. "</span>";
          unset($_SESSION['add-success']);
      } 
   
      if(isset($_SESSION['delete-success'])) {
          echo "<span  class='msg'>" .$_SESSION['delete-success']. "</span>";
          unset($_SESSION['delete-success']);
      } 
      
      if(isset($_SESSION['update-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['update-failed']. "</span>";
          unset($_SESSION['update-failed']);
      }
     
      if(isset($_SESSION['add-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['add-failed']. "</span>";
         unset($_SESSION['add-failed']);
     }  
     
      if(isset($_SESSION['delete-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['delete-failed']. "</span>";
         unset($_SESSION['delete-failed']);
     } 
 ?><br><br><br><br>

   


<a href="itemadd.php" class="btn-primary12">ADD ITEM</a><br><br><br>



<table>
        <tr>
            <th>Item ID</th>
            <th>Title</th>
            <th>Image</th>

          
            <th>Price</th>
            <th>Category ID</th>
            <th>Displayed</th>
            <th>Live</th>
            <th>Actions</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM item";
            $res=mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($res==TRUE)
            {
                    
                    $yow =1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $title = $rows['title'];
                            $description = $rows['description'];
                            $price = $rows['price'];
                            $brand_id=$rows['brand_id'];
                            $featured=$rows['featured'];
                            $active=$rows['active'];
                        ?>
                         <tr>
            <th><?php echo $yow++;?></th>
            <td><?php echo $title;?></td>
            <td><img src="<?php echo $rows['images_name']; ?>" height="100" width="100"></td>
          
            <td><?php echo $price;?></td>
            <td><?php echo $brand_id;?></td>
            <td><?php echo $featured;?></td>
            <td><?php echo $active;?></td>
            <td>
            <a href="<?php echo SITEURL;?>/register/itemupdate.php?id=<?php echo $id;?>" class="btn-primary">Edit Item</a>
            <a href="<?php echo SITEURL;?>/register/itemdelete.php?id=<?php echo $id;?>" class="btn-primary12">Delete Item</a>
            
            </td>
        </tr>
                    <?php	
                    }
                    }
                    else{
                        echo "NO DATA FOUND";
                    }
            }
        ?>
       
    </table>
	<?php include ('../partials/footer.php')?>

</div>
            
	    </div>
	</div>
</div>
	

</body>
</html>