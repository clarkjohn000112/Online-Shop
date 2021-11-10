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
	session_start();
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
        <?php 

        if(isset($_GET['brand_id']))
            {
                $brand_id = $_GET['brand_id'];
                $sql3 = "SELECT title from brand where id=$brand_id";
                $res3 = mysqli_query($conn,$sql3);
                $row3= mysqli_fetch_assoc($res3);
                $brand_title = $row3['title'];
            }
        else
            {
                header("location:".SITEURL);
            }


            
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
            <div class="container4">
                 <h2>Items available on <a href="#" class="text-black"><?php echo $brand_title?></a></h2>
            </div>


            <div class="item_wrap">
            <?php
                $sql2 = "SELECT * FROM item where brand_id=$brand_id";
                $res4 = mysqli_query($conn, $sql2);
                $ct = mysqli_num_rows($res4);
                if($ct>0)
                {
                    while($row2=mysqli_fetch_assoc($res4))
                    {
                        $id1 = $row2['id'];
                        $title1 = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        ?>
                         <div class="container5">
                         <div class="botones">
                                  <h2><?php echo $title1?></h2>
                                  <img class="item-menu-img2" src="<?php echo $row2['images_name']; ?>" >
                                    <p class="item-price"><?php echo $price?></p>
                                    <p class="item-detail"> 
                                    
                                        <?php echo $description?>
                                    </p>
                                <br>
                                
                                    <a href="<?php echo SITEURL1;?>register/itemcheck.php? item_id=<?php echo $id1?>&&user_id=<?php echo $user_id?>" class="btn btn-primary">Check Out</a>
                                    <a href="<?php echo SITEURL1;?>register/itemcart.php? item_id=<?php echo $id1?>&&user_id=<?php echo $user_id?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                        
               </div>
                        <?php
                    }
                }
                else
                { 
                    echo "<div class='error'>This Category does not have item yet</div>";
                }
            ?>
			 <div class="clearfix"></div>
	    	</div>
	    </div>
	</div>
</div>

</body>
</html>