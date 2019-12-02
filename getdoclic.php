<!DOCTYPE html>
<html>
<head>
	<title>Doctor's License Page</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<ul>    
<?php
    if (isset($_POST['enter'])) 
{
   $licDate= $_POST["licdate"];    
echo"<h1>Doctor's Licensed Before".$licDate."</h1>";

   $query1= 'SELECT * FROM doctor WHERE licenseDate < "' .$licDate. '"';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("Query failed.");
   }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>License No.: </b>" . " " . $row["docLicNum"] . " " . "<b>Specialty: </b>" . " " . $row["specialty"] . "</li>"; 
     }
   mysqli_close($connection);
?>
    }
</ul>
</body>
</html>
