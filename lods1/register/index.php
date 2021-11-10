<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css ?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include ('../partials/connection.php')?>
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

					<div class="user1"><h3>Welcome <?php echo $user_name?></h3></div>
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
				  <a href="brand.php?user_id=<?php echo $user_id?>">
		              <span class="icon">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          <li>
				  <a href="item.php?user_id=<?php echo $user_id?>">
		              <span class="list">Collections</span>
		            </a>
		          </li>
		          <li>
				  <a href="cart.php?user_id=<?php echo $user_id?>">
		              <span class="list">My Cart</span>
		            </a>
		          </li>
				 
				  <li>
		            <a href="../logout.php">
		              <span class="list">Logout</span>
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
		<div class="item_wrap">
		
            <?php
                $sql = "SELECT * FROM brand where active = 'Yes' and featured = 'Yes' limit 6";
                $res1 = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res1);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res1))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        ?>
						<div class="container3">
						<a href="<?php echo SITEURL1;?>register/brand_item.php?brand_id=<?php echo $id?>&&user_id=<?php echo $user_id?>">            
								 <img class="item-menu-img" src="<?php echo $row['images_name']; ?>" >
                                <br>
                                
                       <br><br>
					</a>
                		</div>

                        <?php
                    }
                }
                else
                { 
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>
			 <div class="clearfix"></div>
	    	</div>
	    	<div class="item_wrap">
				
			<?php
                $sql2 = "SELECT * FROM item where active='Yes' and featured = 'Yes' limit 8";
                $res2 = mysqli_query($conn, $sql2);
                $count1 = mysqli_num_rows($res2);
                if($count1>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title1 = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        ?>

					<div class="container5">
                         <div class="botones">
                             
                                  <img class="item-menu-img2" src="<?php echo $row2['images_name']; ?>" >
								  	<h1 class="item-price"><?php echo $title1?></h1>
                                    <p class="item-price"><?php echo $price?></p>
				
                                    <p class="item-detail"> 
                                        <?php echo $description?>
                                    </p>
                                <br>
                                
                                    <a href="<?php echo SITEURL1;?>register/itemcheck.php? item_id=<?php echo $id?> &&user_id=<?php echo $user_id?>" class="btn btn-primary">Check Out</a>
                                    <a href="<?php echo SITEURL1;?>register/itemcart.php? item_id=<?php echo $id?> &&user_id=<?php echo $user_id?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                        
               		</div>
                        <?php
                    }
                }
                else
                { 
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>
           
            <br>
	    		
			
			<div class="clearfix"></div>
	    	</div>
	    	
	    </div>
	</div>
</div>

</body>
</html>