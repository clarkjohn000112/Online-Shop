<?php 
	include('../partials/connection.php');
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../partials/styles.css">
	<script>
$(document).ready(function() {
       $("#adminbutton").click(function(){
		   $("#containershow").load("../manage-admin.php")
          });
		  $("#brandbutton").click(function(){
		   $("#containershow").load("../manage-brand.php")
          });      
		  $("#itembutton").click(function(){
		   $("#containershow").load("../manage-item.php")
          });      
		  $("#orderbutton").click(function(){
		   $("#containershow").load("../manage-order.php")
          });      
});
</script>
</head>
	<body>
	<br><br><br><br>
    <section class="navbar">
        <div class="container">
		<div class="menu text-right">
			<ul>
			
			<li><a id="adminbutton">Admin</a></li>
			<li><a id="brandbutton">Brand</a></li>
			<li><a id="itembutton">Item</a></li>
			<li><a id="orderbutton">Order</a></li>
			</ul>
		</div>
</div>
<br>
</section>
<div class = "container" id = "containershow">
</div>

    </body>
</html>