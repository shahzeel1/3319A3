<!DOCTYPE html>
<html>
<head>
	<title>Update Patient Doctor</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>

<?php
   include 'connecttodb.php';
?>
<h1>Update Patient's Doctor</h1>
<?php
   $licNum = $_POST["doc"];
   $ohip = $_POST["ohip"];
if (isset($_POST["add"])) {  
   $query1 = 'ALTER TABLE treats DISABLE KEYS';
   $query2 = 'INSERT INTO treats(ohip, docLicNum) VALUES ("'. $ohip.'","'. $licNum .'")';
   $query3 = 'ALTER TABLE treats ENABLE KEYS';
   if (!mysqli_query($connection, $query2)) {
	die("Error: Failed Insert" . mysqli_error($connection));
    } else {echo "Doctor was connected to patient!"; }
}
if (isset($_POST["remove"])) {  
   $query1 = 'ALTER TABLE treats DISABLE KEYS';
   $query2 = 'DELETE  FROM treats WHERE ohip="'. $ohip .'" AND docLicNum="'. $licNum .'"';
   $query3 = 'ALTER TABLE treats ENABLE KEYS';
   if (!mysqli_query($connection, $query2)) {
	die("Error: Connection was not removed " . mysqli_error($connection));
    } else {echo "Doctor removed from the patient"; }
}
   mysqli_close($connection);
?>
</body>
</html>