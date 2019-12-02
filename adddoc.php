  
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
   include 'docpic.php';
   include 'connecttodb.php';
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
   $query1= 'SELECT * FROM doctor';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("Query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $query = 'INSERT INTO doctor values("' . $licNum . '","' . $docfName . '","' . $doclName . '","' . $spec . '", "' . $licDate . '", "'. $hospID .'",)';
   if (!mysqli_query($connection, $query)) {
        die("Error: NEW DOC WAS NOT ADDED" . " " .  mysqli_error($connection));
    } else {
   echo "A NEW DOC WAS ADDED!";
   }
   mysqli_close($connection);
?>
</ol>
</body>
</html>