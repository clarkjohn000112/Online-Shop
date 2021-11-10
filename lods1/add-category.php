<?php include ('partials/menu.php')?>
	<div class="container">
	

        <h1>CATEGORY MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
             if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            } 
	   ?><br><br><br><br>

<form action="" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<th>Title: </th>
					<td>
                        <input type="text" name="title" placeholder="Category Title" required>
                    </td>
				</tr>
                <tr>
					<th>Display: </th>
					<td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No">No</td>
				</tr>
                <tr>
					<th>Live: </th>
					<td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No</td>
				</tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add category" class="btn-secondary">
                    </td>
                </tr>
                
			</table>
</form>
<?php
    

    if(isset($_POST['submit']))
    {
     

        $title=$_POST['title'];
        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
            
        }
        else{
         $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
            
        }
        else{
        $active = "No";
        }

     
        $sql1= "SELECT * FROM tbl_category where title='$title' and featured = '$featured' and active = '$active'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "CATEGORY ALREADY EXIST";
            header("location:".SITEURL.'/admin/add-category.php');
        }
        else
        {

        $sql = "INSERT INTO tbl_category (title,featured,active)
        values ('$title','$featured','$active')";
        $res=mysqli_query($conn,$sql);
         
         if($res==TRUE){
            header("location:".SITEURL.'/admin/manage-category.php');
        }
        else{
            header("location:".SITEURL.'/admin/add-category.php');
        }
    }}
        ?>
 
</div>
<?php include ('partials/footer.php')?>