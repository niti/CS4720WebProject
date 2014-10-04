<?php

$con=mysqli_connect("stardock.cs.virginia.edu","cs4720np8bx","n1t11294WL","cs4720np8bx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nameofResturant = mysqli_real_escape_string($con, $_GET['name']);
$searchresults = mysqli_query($con,"SELECT Name, Review, Reviewer FROM Reviews where Name = '$nameofResturant'");

 echo "<table class='table'>";
   echo "<tr><th>Name</th><th>Review</th><th>Reviewer</th></tr>";
       while($row = mysqli_fetch_array($searchresults)) {
           echo "<tr>";
           echo("<td>" . $row['Name'] . "</td>\n");
           echo("<td>" . $row['Review'] . "</td>\n");
           echo("<td>" . $row['Reviewer'] . "</td>\n");
           echo "</tr>";
       }
   echo "</table>";

mysqli_close($con);
?>
