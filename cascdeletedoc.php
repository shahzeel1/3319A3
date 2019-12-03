<!-- Deletes the doctor anyways-->
<!DOCTYPE html>
<html>
<head>
	<title>Delete Doc Anyway</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
include 'connecttodb.php';
    
?>
<h1>Delete a Doctor:</h1>

<?php
   session_start();
    $fname = $_SESSION ['fname'];// retrieve variables from prev session
    $lname = $_SESSION ['lname'];
    $licNum = $_SESSION ['licNum'];
   
    // delete the doctor
      $query = 'DELETE FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fname . '" AND doctor.lastName = "'. $lname .'";'; // delete teh doctor
       $result2 = mysqli_query($connection, $query);
   
           if (!$result2) {
	die("Error: Unable to Delete Doctor " . mysqli_error($connection));
    } 
    else {
        echo "Doctor Deleted!"; 
    }
       

   
         mysqli_close($connection);
    
?>
    
</body>
</html>
