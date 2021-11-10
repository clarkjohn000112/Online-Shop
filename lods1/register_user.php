
<?php include ('partials/connection.php')?>
<html>
    <head>
        <title>REGISTER USER</title>
        <link rel="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>

    <body>
    <div class="wrapper">

<div class="top_navbar">
    <div class="logo">
        <a href="login.php">SECRET SHOP</a>
    </div>
    <div class="top_menu">
        <div class="home_link">
            <a href="login.php">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span >Go back to log in.</span>
            </a>
        </div>
        
    </div>
</div>
       
    </head>

    <body>


  <br>

<div class="containers">
    
<?php 
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
       echo $_SESSION['no-login-message'];
       unset($_SESSION['no-login-message']);
    }
?>


  <form action="" method="POST" class="container2"><br><br> 
  <h1 style="background-color:black;text-align:center;color:white;font-family:cambria;font-weight:none;"> REGISTER USER</h1>
  <br><br>
    <h3 class="text">Fullname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="logincon" type="text" placeholder="      Enter Full Name.." name="full_name" required></h3><br>
    <h3 class="text">Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="logincon" type="text" placeholder="      Enter Address.." name="address" required></h3><br>
    <h3 class="text">Contact Number:
    <input class="logincon" type="text" placeholder="      Enter Phone Number.." name="contact" required>  </h3><br>
    <h3 class="text">Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="logincon" type="text" placeholder="      Enter Email Address.." name="email" required> </h3><br>
    <h3 class="text">Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="logincon" type="text" placeholder="      Enter Username.." name="username" required></h3><br>
    <h3 class="text" >Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="logincon" type="password" placeholder="      Enter Password.." name="password" required></h3> <br>
    <br> <br> <br><input type="submit" name="submit" value="REGISTER" class="btn-primary1">
    
</form>


<?php 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql1= "SELECT * FROM user where full_name='$full_name' and username = '$username' and password = '$password'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "USER ALREADY EXIST";
            header("location:".SITEURL.'/admin/add-admin.php');
        }
        else
        {

        $sql = "INSERT into user (full_name,contact,email,address,username,password)
                values ('$full_name','$contact','$email','$address','$username','$password')";
      
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
            echo "DATA INSERTED";
            $_SESSION['add'] = "DATA INSERTED";
            header("location:".SITEURL.'/login.php');
        }
        else{
            $_SESSION['add'] = "FAILED TO INSERT";
            header("location:".SITEURL.'/register_user.php');
        }
    }
    }
    ?>
    
</div>    
</body>
</html>
