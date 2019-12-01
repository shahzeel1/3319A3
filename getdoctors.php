<!DOCTYPE html>
<html>
<head>
	<title>List of Doctors</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<script src="js.js"></script>
<?php
include 'connecttodb.php';
if (isset($_POST['submit'])) { if(isset($_POST['radio1'])) { echo '<form 
action="getmoredoctordata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="submit" value="Get More Doctor Data">';
echo '</form>';
}
if(isset($_POST['radio2']))
{
echo '<form action="getmoredoctordata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="submit" value="Get More Doctor Data">';
echo '</form>';
}
if(isset($_POST['radio3']))
{
echo '<form action="getmoredoctordata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY firstName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
echo '<input type="submit" value="Get More Doctor Data">';
echo '</form>';
}
if(isset($_POST['radio4']))
{
echo '<form action="getmoredoctordata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY firstName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }   echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ol>";
	echo '<input type="submit" value="Get More Doctor Data">';
	echo '</form>';
}
}
 ?>
	
	</body>
</html>
