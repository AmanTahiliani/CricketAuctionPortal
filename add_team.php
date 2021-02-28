<?php
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"auction");
//$db=mysqli_select_db("auction",$conn);
session_start();
$sql="insert into bidder (bid, team_name,money) values ('$_POST[bid]','$_POST[name]','$_POST[money]')";
mysqli_query($conn,$sql);
echo "Record added";
mysqli_close($conn);
?>
