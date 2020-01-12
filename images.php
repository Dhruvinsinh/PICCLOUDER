<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location:index.html");
}
else{
?>
<a href="upload.php"><button>Upload</button></a><br><hr>
<?php
$id=$_SESSION['id'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"cloud");
$result=mysqli_query($conn,"select * from images where id=\"$id\"");
	
		echo "<table border=1><tr>";
	while($row=mysqli_fetch_assoc($result))
	{	echo "<td>";
		$path=$row['path'];
		$did=$row['uid'];
		echo "<img src=\"$path\" width=\"100\" height=\"100\" border=\"1\" ></img></td><td>";
		echo "<form action=\"delete.php\"><button value=\"$did\" name=\"d\">Delete</button></form></td>";
	}
}
?>
