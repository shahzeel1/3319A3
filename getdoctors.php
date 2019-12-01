<!DOCTYPE html>
<html>
<head>
	<title>List of Doctors</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<?php
include 'connecttodb.php';
if (isset($_POST['enter'])) 
{

$val = $_POST['radio'];

    
 if ($val == "First Name A-Z") 
{ 
    echo '<form 
action="getdoctorinfo.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY firstName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="enter" value="Get Doctor Info">';
echo '</form>';
}
if($val = "Last Name A-Z" ) 
{
    echo '<form 
action="getdoctorinfo.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="enter" value="Get Doctor Info">';
echo '</form>';
}
if($val = "First Name Z-A") 
{ 
    echo '<form 
action="getdoctorinfo.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY firstName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
if($val = "Last Name Z-A") { 
    echo '<form 
action="getdoctorinfo.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
}
 ?>
	
	</body>
</html>
