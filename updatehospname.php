<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<script src="js.js"></script>
<?php
   include 'connecttodb.php';
?>
<h1>Update a Hospital Name:</h1>

<?php
$prev = $_POST['hospital'];
$var = $_POST['hospName'];
if (isset($_POST['submit'])) {
 if ($prev  == "ABC") {
   $query1 = 'UPDATE hospital SET hospital.hospName="'.$var.'" WHERE hospital.hospCode="ABC"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Database query failed. Hospital name not changed.");
   } else {echo "Victoria hospital in London has had its name changed.";}
} if ($prev  == "BBC") {
   $query1 = 'UPDATE hospital SET hospital.hospName="'.$var.'" WHERE hospital.hospCode="BBC"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Database query failed. Hospital name not changed.");
   } else { echo "St. Joseph's hospital in London has had its name changed.";}
} if ($prev  == "DDE") {
   $query1 = 'UPDATE hospital SET hospital.hospName="'.$var.'" WHERE hospital.hospCode="DDE"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Database query failed. Hospital name not changed.");
   } else {echo "Victoria hospital in BC has had its name changed.";}
}}
   mysqli_close($connection);
?>
</form>
</body>
</html>