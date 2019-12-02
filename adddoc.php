<!-- Add's the doctor entered in by the user -->  
<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>
<?php
   include 'connecttodb.php'; // connect to the db
?>
<h1>Adding a Doctor:</h1>
<ol>
<?php
   $dfName= $_POST["fName"];
   $dlName= $_POST["lName"];
   $spec= $_POST["spec"];
   $licDate= $_POST["licDate"];
   $licNum= $_POST["licNum"];
   $hospID= $_POST["hosp"];
   if($licNum!=NULL)// check to make sure license number was added
   {
    // check to make sure the date is valid 
       $valid = validateDate($licDate); // make sure thr date is valid 
    if($valid)
    {
   $query = 'INSERT INTO doctor values("' . $licNum . '","' . $docfName . '","' . $doclName . '","' . $spec . '", "' . $licDate . '", "'. $hospID .'")'; // get the query to add the doc
   if (!mysqli_query($connection, $query))// test query in the db {
        die("Error: NEW DOC WAS NOT ADDED LICENSE NUM ALREADY EXISTS" . " " .  mysqli_error($connection));
    } else {
   echo "A NEW DOC WAS ADDED!";
   }
        
   mysqli_close($connection); // close the connection to the db
   }
       else 
       {
           echo "Error: The date entered was not of the correct format";
       }
   }
    else 
    {
        echo "Error: No license num was added";
    }
       // fucntion checks if the date format is correct
    function validateDate($date, $format='Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    
    return $d && $d->format($format) == $date;
}
?>
</ol>
</body>
</html>
