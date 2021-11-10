<?php
session_start();

    include("conn.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Contact_Number = $_POST['Contact_Number'];
        $Email = $_POST['Email'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($Name) && !empty($Address) && !empty($Contact_Number) && !empty($Email))
        {
            $user_id = random_num(5); // random number
            $query = "insert into users (user_id, user_name, password, Name, Address, Contact_Number, Email) values ('$user_id', '$user_name', '$password', '$Name', '$Address', '$Contact_Number', '$Email')";

            mysqli_query($conn, $query); // save the query using con variable
            $_SESSION['msg'] = "Account created, you may now log in."; 
            header('Location: login.php');
            die;
        }
        else
        {
            echo '<script>alert("Please enter valid information...")</script>';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<style> 
		#text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
				color:black;
                width: 100%;
            }

            #button{
                padding: 10px;
                width: 100px;
                color: white;
                background-color: black;
                border: none;
            }

            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
            .panel-body img{
	    width: 100%;
	    height: 23rem;
	    object-fit: cover;
	}
	
	a{
		color:black;

	}
	a:link {
  	color: teal;
	}

	/* visited link */
	a:visited {
	color: Teal;
	}

	/* mouse over link */
	a:hover {
	color: red;
	
	}

	/* selected link */
	a:active {
	color: Teal;
	}
    
    .msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
    
    
    
    </style>
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
			<a href="signup.php">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				<a href="#">
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
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
	        	<ul>
		          
		          <li>
		            <a href="signup.php" class="active">
		             
		              <span class="list">Sign-up</span>
		            </a>
		          </li>
                 
		         
		         
		        </ul>

		        

	        </div>
	    </div>

		

	    
	</div>
	
</div>
<br><br>
<br>


<h1 style="background-color:black;text-align:center;color:white;font-family:cambria;font-weight:none;"><br>Welcome New Customer, Sign up now.<br><br></h1>
<br><br>
<br>
        <div id="box">
            <form method="post">
            <center><img src="images\logo.png" alt="Secret Shop Logo" width="120" height="120" style="text-align:center;"></center>
                <div style="font-size: 20px; margin: 10px;color: white;text-align:center;font-family:cambria;font-weight:none;">Create your Account</div>
                <br>
                <br>
                <input id="text" type="text" name="user_name" placeholder="Username" required><br><br>
                <input id="text" type="password" name="password" placeholder="Password" required><br><br>
                <input id="text" type="text" name="Name" placeholder="Full Name" required><br><br>
                <input id="text" type="text" name="Address" placeholder="Address" required><br><br>
                <input id="text" type="text" name="Contact_Number" placeholder="Contact Number" required><br><br>
                <input type="email" id="text" name="Email" placeholder="Email Address" required>
                <br><br>
                <br>
                <center><input id="button" type="submit" value="Sign-up" style="cursor:pointer;text-align:center;"></center><br>

                <br>
            </form>
            <form action="login.php">
            <p style="color:white;text-align:center;">Back to  <button type="submit" style="cursor: pointer;">Log in</button></p>
            </form>

        </div>
        <br><br>
                <br><br><br>
                


</body>
</html>