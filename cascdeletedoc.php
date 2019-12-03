<!-- Deletes the doctor anyways-->
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
include 'connecttodb.php';
    
?>
<h1>Delete a Doctor:</h1>
<ol>
<?php
   session_start();
    $fname = $_SESSION ['fname'];
    $lname = $_SESSION ['lname'];
    $licNum = $_SESSION ['licNum'];
    var_dump($licNum);
    var_dump($fname);
    var_dump($lname);
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
    </ol>
</body>
</html>
