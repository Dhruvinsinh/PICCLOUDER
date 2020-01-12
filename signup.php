<?php
$name=$_POST['name'];

$pass=$_POST['pass'];


$repass=$_POST['repass'];

$no=$_POST['no'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"cloud");
$result=mysqli_query($conn,"select * from user where name=\"$name\" and pass=\"$pass\" and no=\"$no\"");
$sta=0;
while($row=mysqli_fetch_assoc($result))
{
	echo $row['name']." already exist";
	$sta=1;
	break;
}
if($sta==1){

}
if($sta==0){
$result=mysqli_query($conn,"insert into user (name,pass,no) values (\"$name\",\"$pass\",\"$no\")");
if($result>0){
		header("Location:index.html");
}
}
?>
