<!-- This php file updates the hospital names-->
<!DOCTYPE html>
<html>
<head>
	<title>Update Hospital Name</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
   include 'connecttodb.php';// connect to the db
?>
<h1>Update Hospital Name:</h1>

<?php
$hid = $_POST['hosp'];// hosp id 
$newname = $_POST['hospName'];// new name
if (isset($_POST['submit'])) {
    
    // for each if statement the id is taken and the name is then changed 
    
 if ($hid  == "ABC") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="ABC"';// update query
   $result = mysqli_query($connection,$query1);// send the query into the db
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else {echo "Updated London' Victoria Hospital's Name";}
     
} if ($hid  == "BBC") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="BBC"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else { echo "Updated St.Joseph's name";}
     
     
} if ($hid  == "DDE") {
   $query1 = 'UPDATE hospital SET hospital.name="'.$newname.'" WHERE hospital.hosCode="DDE"';
   $result = mysqli_query($connection,$query1);
   if (!$result) {
          die("Hospital name was not updated because the query failed");
   } else {echo "Updated Victoria's Victoria Hospital's name";}
}}
   mysqli_close($connection);// close the connection 
?>

</body>
</html>