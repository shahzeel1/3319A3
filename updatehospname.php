<!DOCTYPE html>
<html>
<head>
	<title>Update Hospital Name</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<?php
   include 'connecttodb.php';
?>
<h1>Update Hospital Name:</h1>

<?php
$prev = $_POST['hosp'];
$newname = $_POST['hospName'];
if (isset($_POST['submit'])) {
 if ($prev  == "ABC") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="ABC"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else {echo "Updated London' Victoria Hospital's Name";}
} if ($prev  == "BBC") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="BBC"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else { echo "Updated St.Joseph's name";}
} if ($prev  == "DDE") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="DDE"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else {echo "Updated Victoria's Victoria Hospital's name";}
}}
   mysqli_close($connection);
?>
</form>
</body>
</html>