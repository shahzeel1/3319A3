// This page displays the doctors in the order that the user selected-->
<!DOCTYPE html>
<html>
<head>
	<title>List of Doctors</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
    
<body>
<h1>List of Doctor's</h1>    
    
<?php
include 'connecttodb.php';//Connect to the database
//Make sure the enter button was triggered
if (isset($_POST['enter'])) 
{

$order = $_POST['radio']; // the order that the user has selected -->

 // For the following if statements the doctor`s first and last name will be displayed-->    
// FN ASC --> 
if ($order == "First Name A-Z") 
{ 
    echo '<form 
action="getdocdata.php" method="post">';// call the doctor info page-->
   $query = "SELECT * FROM doctor ORDER BY firstName ASC";
   $result = mysqli_query($connection,$query);<!- send in the query to the db-->
   // no result means the query failed-->
    if (!$result) {
        die("Databases query failed.");
    }   echo "<ul>";// unordered list -->
    // for each of the doctors display their names-->
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);// free memory-->
	echo "</ul>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
    //LN ASC-->
if($order == "Last Name A-Z" ) 
{
    echo '<form 
action="getdocdata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ul>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
    //FN DESC-->
if($order == "First Name Z-A") 
{ 
    echo '<form 
action="getdocdata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY firstName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ul>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
    //LS DESC-->
if($order == "Last Name Z-A") { 
    echo '<form 
action="getdocdata.php" method="post">';
   $query = "SELECT * FROM doctor ORDER BY lastName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Databases query failed.");
    }   echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>";
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	echo "</ul>";
echo '<input type="submit" value="Get Doctor Info">';
echo '</form>';
}
}
 ?>
	
	</body>
</html>
