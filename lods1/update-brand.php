<?php include ('partials/menu.php')?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
    
        <br>
       
        <?php 
           if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql="SELECT * from BRAND WHERE id=$id";
        
                    $res=mysqli_query($conn, $sql);
        
                    if($res==TRUE){
                        $count = mysqli_num_rows($res);
                        if($count==1){
                            $row=mysqli_fetch_assoc($res);
                            $title= $row['title'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                        }
                        else{
                            header("location:".SITEURL.'/admin/manage-category.php');
                        }
        
                    }
                }
           
        ?>

    <form action="" method="POST" enctype="multipart/form-data">
			<table>
           
				<tr>
					<th>Title: </th>
					<td>
                        <input type="text" name="title" value="<?php echo $title?>"required>
                    </td>
				</tr>
                <tr>
					<th>Brand Logo: </th>
					<td>
                        <input type="file" name="photo" required>
                    </td>
				</tr>
                <tr>
					<th>Featured: </th>
					<td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
				</tr>
                <tr>
					<th>Live: </th>
					<td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No</td>
				</tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update" class="btn-primary">
                    </td>
                </tr>
                
			</table>
</form>
  
</div>

<?php

if(isset($_POST['submit']))
{
 $id =$_POST['id'];
 $title=$_POST['title'];
 $featured=$_POST['featured'];
 $active=$_POST['active'];

 $fileinfo=PATHINFO($_FILES["photo"]["name"]);

 if(empty($fileinfo['filename'])){
 $location="";
 }
 else{
 $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
 move_uploaded_file($_FILES["photo"]["tmp_name"],"images/" . $newFilename);
 $location="images/" . $newFilename;
 }


 $sql2 = "UPDATE brand set
 title='$title',
 images_name='$location',
 featured='$featured',
 active='$active'
 where id=$id";

$res2=mysqli_query($conn,$sql2);

if($res2==TRUE){
    echo "Updated";
    header("location:".SITEURL.'/manage-brand.php');
}
else{
    echo "failed";
    header("location:".SITEURL.'/manage-brand.php');
}
}


?>

<?php include ('partials/footer.php')?>