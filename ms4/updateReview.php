<?php
$con=mysqli_connect("stardock.cs.virginia.edu","cs4720np8bx","n1t11294WL","cs4720np8bx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name = mysqli_real_escape_string($con, $_GET['name']);
$nameRev = mysqli_real_escape_string($con, $_GET['nameofRev']);
$newReview= mysqli_real_escape_string($con, $_GET['newRestReview']);

mysqli_query($con,"UPDATE Reviews SET Review='$newReview'
WHERE (Reviewer='$nameRev' AND Name='$name')");


echo "<div class='alert alert-warning' role='alert'> Review by ", $nameRev, " for ", $name , " was updated </div>";
mysqli_close($con);
?>n