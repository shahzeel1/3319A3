<!-- Deletes the doctor anyways-->
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
<h1>Delete a Doctor:</h1>
<ol>
<?php
   session_start();
   $licNum= $_POST["$licNum"];
   $querySetFalse= 'SET FOREIGN_KEY_CHECKS=0';
   
   
   
   $result=mysqli_query($connection,$querySet);
    if (!$result) {
         die("database set foreign key to 0 failed.");
     } 
    else { echo "foreign key set to 0";}
    
    $queryDeleteTreat= 'DELETE FROM treats WHERE treats.docLicNum="'. $licNum .'"';
     $result=mysqli_query($connection,$queryDeleteTreat);
    if (!$result) {
         die("Could not delete from treats");
     } 
    else { echo "deleted from treats";} 
    
    $queryDeleteDoc= 'DELETE FROM doctor WHERE doctor.docLicNum = "'. $licNum .'"';
     $result=mysqli_query($connection,$queryDeleteDoc);
    if (!$result) {
         die("doc was not deleted from doc table");
     } 
    else { echo "doc deleted from doc table.";}
    
    $querySetTrue= 'SET FOREIGN_KEY_CHECKS=1';
    
    $result=mysqli_query($connection,$querySetTrue);
    if (!$result) {
         die("doreign key set to 1");
     } else 
    { echo "Deleted.";}
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
