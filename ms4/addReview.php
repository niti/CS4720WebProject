<?php

$con=mysqli_connect("stardock.cs.virginia.edu","cs4720np8bx","n1t11294WL","cs4720np8bx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$nameofResturant =mysqli_real_escape_string($con, $_GET['Name']); 
$Review = mysqli_real_escape_string($con, $_GET['Review']); 
$Reviewer = mysqli_real_escape_string($con, $_GET['Reviewer']); 

           $sql="INSERT INTO Reviews (Name, Review, Reviewer) VALUES ('$nameofResturant','$Review','$Reviewer')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "<div class='alert alert-success' role='alert'> Review by ", $Reviewer, " for ", $nameofResturant, " was added </div>";


mysqli_close($con);
?>







