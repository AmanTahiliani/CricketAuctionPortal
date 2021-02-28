<?php
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,"auction");
session_start();
$sql1="select Pno from current_player;";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
$curr_bidder="select * from player where '".$row1['Pno']."';";
$result=mysqli_query($conn,$curr_bidder);
$row=mysqli_fetch_array($result);
$sql1="select * from bidder where bid='".$row['current_bidder']."';";
$result1=mysqli_query($conn, $sql1);
$row1=mysqli_fetch_array($result1);
$sql="insert into sold_player values('".$row['pid']."','".$row['starting_bid']."','".$row1['team_name']."','".$row['pname']."');";
$result=mysqli_query($conn,$sql);
$sql="update bidder set money=money-'".$row['starting_bid']."';";
$result=mysqli_query($conn,$sql);
$sql="update bidder set acq_players=acq_players+1;";
$result=mysqli_query($conn,$sql);
$sql="update current_player set Pno=Pno+1 where Pno<32;";
$result=mysqli_query($conn,$sql);
header("Location: raise3.php");
mysqli_close($conn);
?>