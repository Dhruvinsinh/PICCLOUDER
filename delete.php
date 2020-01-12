<?php
$d=$_GET['d'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"cloud");
$result=mysqli_query($conn,"delete from images where uid=\"$d\"");
if($result){
	header("Location:images.php");
}
?>
