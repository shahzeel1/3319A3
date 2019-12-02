<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>

<?php
	session_start();
	include 'docpic.php';
	include 'connecttodb.php';
?>
<ol>
<?php
   $query = 'SELECT * FROM doctor';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
	if ($row["docPicture"] != NULL) {
	echo '<img src="'.$row["docPicture"].'" height="60" width="60">';
} else { echo 'No Picture';}
	echo '<input type="radio" name="doctors" value="';
	echo $row["licenseNum"];
        echo '">' . "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>License Number: </b>" . " " . $row["licenseNum"] . " " . "<b>Specialtiy: </b>" . " " .  $row["specialty"] . " " .  "<b>License Date: </b>" . " " .  $row[licenseDate] . " " . " " .  $row["hospName"];
}
     mysqli_free_result($result);
     $_SESSION["licNum"] = "doctors";
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>