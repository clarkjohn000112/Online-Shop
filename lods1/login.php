
<?php include ('partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="style.css">
<html>
    <head>
        <title>LOGIN </title>
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
                <span >Home</span>
            </a>
        </div>
        
    </div>
</div>

<div class="main_body">  
</div>

</div>
<br><br>

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


  <form action="" method="POST" class="container2">
  <center><img src="images\logo-shop.png" alt="Secret Shop Logo" width="150" height="150" style="text-align:center;"></center>
  <br>
    <h1  style="background-color:black;text-align:center;color:white;font-family:cambria;font-weight:none;">LOGIN PAGE</h1>
    <br>
    <input class="logincon" type="text" placeholder="      Enter Username" name="username" required>
    <br> 
     <br>
    <input class="logincon" type="password" placeholder="      Enter Password" name="password" required>
    <br> <br><input type="submit" name="submit" value="ADMIN" class="btn-primary1">
    <br> <br><input type="submit" name="submit1" value="USER" class="btn-primary1">
    <br> <br>

    
</form>

<form  method="post" class="container2">
<h4  style="text-align:center;color:white;font-family:cambria;font-weight:none;">New User? Click here.</h4>
<br>
    <input type="submit" name="submit2" value="Register" class="btn-primary1">
</form>
    <br> <br> <br>
   

</div>    
</body>
</html>

<?php 
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql = "SELECT * FROM admin where username='$username' AND password='$password'";
        $res=mysqli_query($conn, $sql);
        $count=mysqli_num_rows($res);
        if($count==1){
            $_SESSION['user']= $username;
            header("location:".SITEURL.'/register/adminmanage.php');
        }
        else{
            $_SESSION['login'] = "<div class='error text-center'> Username or Password did not match.</div>";
            header("location:".SITEURL.'/admin/login.php');
        }
       

    }
?>
<?php 
    if(isset($_POST['submit1']))
    {
        $username1=$_POST['username'];
        $password1=md5($_POST['password']);
        $sql1 = "SELECT * FROM user where username='$username1' AND password='$password1'";
        $res1=mysqli_query($conn, $sql1);
        $count1=mysqli_num_rows($res1);
        if($count1==1){
                while($row2=mysqli_fetch_assoc($res1))
                {
                    $id1 = $row2['id'];
                                header("location:".SITEURL.'/register/index.php?user_id='.$id1);
                }
      
        }
        else{
            $_SESSION['login'] = "<div class='error text-center'> Username or Password did not match.</div>";
            header("location:".SITEURL.'/admin/login.php');
        }  
    }
?>
<?php 
 if(array_key_exists('submit2', $_POST)) {
    submit2();
}
function submit2() {
    header("location:".SITEURL.'/register_user.php');
}
?>