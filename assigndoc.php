<!-- assign or unassign a doc to a patient --> 
<!DOCTYPE html>
<html>
<head>
	<title>Update Patient Doctor</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
   include 'connecttodb.php';
?>
<h1>Update Patient's Doctor</h1>
<?php
   $licNum = $_POST["doc"];// get the license num entered
   $ohip = $_POST["ohip"];// get the ohip num entered
// if the user wants to adda  connection then disable the keys add the info to the treats table and enable keys
if (isset($_POST["add"])) {  
   $diskeys = 'ALTER TABLE treats DISABLE KEYS';
   $query2 = 'INSERT INTO treats(ohip, docLicNum) VALUES ("'. $ohip.'","'. $licNum .'")';
   $enkeys = 'ALTER TABLE treats ENABLE KEYS';
   if (!mysqli_query($connection, $query2)) {
	die("Error: Failed Insert" . mysqli_error($connection));
    } else {echo "Doctor was connected to patient!"; }
}
    // if the user chose to remove the connection disable keys, remove the connection and enable the keys again 
if (isset($_POST["remove"])) {  
   $diskeys = 'ALTER TABLE treats DISABLE KEYS';
   $query2 = 'DELETE  FROM treats WHERE ohip="'. $ohip .'" AND docLicNum="'. $licNum .'"';
   $enkeys = 'ALTER TABLE treats ENABLE KEYS';
   if (!mysqli_query($connection, $query2)) {
	die("Error: Connection was not removed " . mysqli_error($connection));
    } else {echo "Doctor removed from the patient"; }
}
   mysqli_close($connection);// close the connection
?>
</body>
</html>