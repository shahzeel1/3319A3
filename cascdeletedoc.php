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
include 'deletedoc.php';    
?>
<h1>Delete a Doctor:</h1>
<ol>
<?php
   
      $query = 'DELETE FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fName . '" AND doctor.lastName = "'. $lName .'";'; // delete teh doctor
       $result2 = mysqli_query($connection, $query);
   
           if ($result2) {
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
