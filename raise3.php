

<!DOCTYPE html>
<html lang="en">
    
    
    <head> 
        <link rel="stylesheet" type="text/css" href="outeruse/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="outeruse/css/grid.css">
        <link rel="stylesheet" type="text/css" href="outeruse/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/stylef2.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">
        <title>Auction Page</title>
           
    </head>
    

      

<body>
  <header>
                <div class="row">   
                <img src="resources/img/cec57895-2957-4592-b38f-4021971b3cb3_200x200.png" alt="CricPlay" class="logo">
                </div>
      <?php
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,"auction");
session_start();
$sql5="select Pno from current_player;";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_array($result5);
$sql="select * from player where pid='".$row5['Pno']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "<p style='color:white'; >Player Name: ".$row["pname"]."<br>";
echo "Age: ".$row["age"]."<br>";
echo "Nationality: ".$row["nationality"]."<br>";
echo "No. of matches: ".$row["matches"]."<br>";
echo "Position: ".$row["position"]."<br>";
echo "100s: ".$row["100s"]."<br>";
echo "50s: ".$row["50s"]."<br>";
echo "Innings: ".$row["innings"]."<br>";
echo "Best: ".$row["best"]."<br>";
echo "No. of Balls: ".$row["balls"]."<br>";
echo "Wickets: ".$row["wickets"]."<br>";
$sql="update player set starting_bid=starting_bid+500000 where pid='".$row5['Pno']."';";
$result=mysqli_query($conn,$sql);
$sql="select starting_bid from player where pid='".$row5['Pno']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "Current Bid: ".$row["starting_bid"]."<br>";
$x=$_POST['Raise'];
$sql="update player set current_bidder=$x where pid='".$row5['Pno']."';";
$result=mysqli_query($conn,$sql);
$sql="select current_bidder from player where pid='".$row5['Pno']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "Highest Bidder: ".$row["current_bidder"]."<br>";
mysqli_close($conn);
?>

        <form name="f1" method="post" action="">
    
                    Team 1<input type="radio" name="Raise" value="1">
                    Team 2<input type="radio" name="Raise" value="2">
            
                    Team 3<input type="radio" name="Raise" value="3">
                    Team 4<input type="radio" name="Raise" value="4">
            
                    <div style="text-align: center" >
                <button type="submit" name="submit" value="raise" class="btn btn-ghost">RAISE</button>
                </div>
        </form>
        <form name="f2" method="post" action="sold.php">
  <div class="but ">
                <button type="submit" name="submit" value="sold" class="button">SOLD</button>
                </div>
        </form>
    </header>
</body>
</html>
