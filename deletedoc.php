
<!-- Delete the doc specified by the user-->
<!DOCTYPE html>
<html>
<head>
	<title>Delete A Doc</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
   include 'connecttodb.php';// connect to the db
?>
<h1>Delete a Doctor:</h1>
<ol>
<?php
   session_start();
   $_SESSION['var'] = $_POST["licNum"];
   $fName= $_POST["fname"];
   $lName = $_POST["lname"];
   $licNum = $_POST["licNum"];
   $query1= 'SELECT * FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fName . '" AND doctor.lastName = "'. $lName .'"';
   $result=mysqli_query($connection,$query1);
   if (mysqli_num_rows($result)==0) {
          die("The Doctor is not in the database. Try Again.");
   }
   try {
   $query = 'DELETE FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fName . '" AND doctor.lastName = "'. $lName .'"';
   if (!mysqli_query($connection, $query)) {
	throw new Exception('Constraints');
	die("Error: Unable to Delete Doctor " . mysqli_error($connection));
    } else {echo "Doctor Deleted!"; }
} catch (Exception $e) {
	echo "Are you sure you want to delete a doctor that treats patients right now?";
	echo "<form action='cascdeletedoc.php' method='post'>";
	echo "<input type='submit' name='$licNum' value='Delete the Doc'>";
	echo "</form>"; 
}
   mysqli_close($connection);
?>
</body>
</html>
