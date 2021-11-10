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
				<a href="index.html">
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
						<a href="adminLogout.php">
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
		            <a href="adminmanage.php"  class="active">
		              <span class="icon">
		              <span class="list">Admin</span>
		            </a>
		          </li>
		          <li>
		            <a href="../manage-brand.php">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="../manage-item.php">
		              <span class="list">Items</span>
		            </a>
		          </li>

                  <li>
		            <a href="../manage-order.php" >
		             
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
	    	<div class="item_wrap">
	    		<div class="item">
	    			<div class="gallery">
  					<a target="_blank" href="#">
  					  <img src="images\header.png" alt="Cinque Terre" width="500" height="600">
  					</a>
  				</div>
	    		</div>
	    		
	    	</div>
	    	<div class="item_wrap">
	    		<div class="item">
	    			<div class="gallery1">
  					<a  href="dailygrind.html">
  					  <img src="images\daily.png" alt="Cinque Terre" width="500" height="600">
  					</a>
  				</div>
	    		</div>
	    		<div class="item">
	    			<div class="gallery1">
  					<a  href="enimal.html">
  					  <img src="images\enimal.png" alt="Cinque Terre" width="500" height="600">
  					</a>
				</div></div>
	    	</div>
	    	<div class="item_wrap">
	    		<div class="item"><div class="gallery1">
  					<a  href="dbtk.html">
  					  <img src="images\dbtk.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    		<div class="item"><div class="gallery1">
  					<a href="payaman.html">
  					  <img src="images\tp.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    	</div>
	    	<div class="item_wrap">
	    		<div class="item"><div class="gallery1">
  					<a  href="bucket.html">
  					  <img src="images\bs.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    		<div class="item"><div class="gallery1">
  					<a href="sumptuous.html">
  					  <img src="images\sumptuous.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    	</div>
	    	
	    </div>
	</div>
</div>
	

</body>
</html>