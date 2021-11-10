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
{session_start();
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
                        $id3 = $row['id'];
                        $title = $row['title'];
                        ?>
                        <div class="container3">
                               <a href="brand_item.php?user_id=<?php echo $user_id?>&&brand_id=<?php echo $id3?>">
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
            
        </div>
    </div>
</div>

</body>
</html>