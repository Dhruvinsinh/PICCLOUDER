<?php
session_start();
$name=$_POST['name'];

$pass=$_POST['pass'];


$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"cloud");
$result=mysqli_query($conn,"select * from user where name=\"$name\" and pass=\"$pass\"");
$status=0;
while($row=mysqli_fetch_assoc($result))
{
	echo $row['name']." is valid";
	$_SESSION['id']=$row['id'];
	header("Location:images.php");
	$status=1;
	break;
}
if($status==0){
	header("Location:index.html");
	
	
}
?>
