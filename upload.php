<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location:index.html");
}
else{
?>
<html>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image"/>
<input type="submit" name="upload" value="upload"/>
</form>
</html>
<?php
$id=$_SESSION['id'];
if(isset($_POST['upload']))
{
	$image=basename($_FILES['image']['name']);
	echo $image;
	$name="cloudimage/".strval($id).strval($image);
	if(move_uploaded_file($_FILES['image']['tmp_name'],$name))
	{
		echo "copied";
	}
	
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"cloud");
	$result=mysqli_query($conn,"insert into images (id,path) values ($id,\"$name\")");
	if($result>0){
	header("Location:images.php");
	}
}

}

?>
