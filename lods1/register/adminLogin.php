
<?php include ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css">
<html>
    <head>
        <title>LOGIN </title>
        <link rel="stylesheet" href="../css/style.css">
       
    </head>

    <body>


  <br>

<div class="containers">
    <h1 CA>LOGIN PAGE</h1>
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
    <h3>Username</h3><br>
    <input class="logincon" type="text" placeholder="      Enter Username" name="username" required>

    <h3>Password</h3> <br>
    <input class="logincon" type="password" placeholder="      Enter Password" name="password" required>
    <br> <br> <br><input type="submit" name="submit" value="ADMIN" class="btn-primary1">
    <br> <br> <br><input type="submit" name="submit1" value="USER" class="btn-primary1">
    <br> <br> <br>
   
</form>
<form method="post" class="container4">
<input type="submit" name="submit2" value="Register" class="btn-primary1">
</form>
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
            header("location:".SITEURL.'/register/adminlogin.php');
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
            $_SESSION['user']= $username1;
            header("location:".SITEURL.'/index.php');  
        }
        else{
            $_SESSION['login'] = "<div class='error text-center'> Username or Password did not match.</div>";
            header("location:".SITEURL.'/register/login.php');
        }  
    }
 
?>
<?php 
 if(array_key_exists('submit2', $_POST)) {
    submit2();
}
function submit2() {
    header("location:".SITEURL.'/admin/register_user.php');
}
?>