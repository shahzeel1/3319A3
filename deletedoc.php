
<!-- Delete the doc specified by the user-->
<!DOCTYPE html>
<html>
<head>
	<title>Delete A Doc</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
   include 'connecttodb.php';// connect to the db
?>
<h1>Delete a Doctor:</h1>
<ol>
<?php
   
     session_start(); // saves the position this file is at
   // inputs from the user
   $fName= $_POST["fname"];// doc first name
   $lName = $_POST["lname"];// doc last name 
   $licNum = $_POST["licNum"];// doc license num
   $query1= 'SELECT * FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fName . '" AND doctor.lastName = "'. $lName .'";'; // get query to see if the doc is in the database
   $result=mysqli_query($connection,$query1); // send the query into the db
   // f there are no results the doc doesn't exist
    if (mysqli_num_rows($result)==0) {
          die("The Doctor is not in the database. Try Again.");
   }
    else{
   
    $query1 ='SELECT * FROM treats WHERE doctor.docLicNum="'.$licNum.'";';
       $result = mysqli_query($connection, $query1);
       if ($result)
       {
    $query = 'DELETE FROM doctor WHERE doctor.docLicNum="' . $licNum . '" AND doctor.firstName = "' . $fName . '" AND doctor.lastName = "'. $lName .'"'; // delete teh doctor
       $result2 = mysqli_query($connection, $query);
   
           if (!$result2) {
	die("Error: Unable to Delete Doctor " . mysqli_error($connection));
    } 
    else {
        echo "Doctor Deleted!"; 
    }
       
}
        // make sure the doc has to be deleted 
        else {
	echo "Are you sure you want to delete a doctor that treats patients right now?";
	echo "<form action='' method='post'>";       
	echo "<input type='submit' name='yes' value='Yes Delete the Doc'>";
	echo "</form>"; 
            
            
}
   
    }
     
    
    
    
        mysqli_close($connection);
    
?>
    </ol>
</body>
</html>