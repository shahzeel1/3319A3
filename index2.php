<?php
	session_start();
	include_once 'connecttodb.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Zeel's Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<h1 style="text-align: center;">
<span style="font-family: Verdana, Geneva, sans-serif;">Zeel's Doctor Database</span>
</h1>
<hr>

<form action="getdoctors.php" method="post">

<form action="#" method="post">
<table style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 50.0000%;"><strong>Sort By:</strong></td>
      <td style="width: 50.0000%;">
        <input name="radio1" type="radio" value="First Name A-Z">First Name A-Z
        <br>
        <input name="radio2" type="radio" value="Last Name A-Z">Last Name A-Z
        <br>
        <input name="radio3" type="radio" value="First Name Z-A">First Name Z-A
        <br>
        <input name="radio4" type="radio" value="Last Name Z-A">Last Name Z-A
      </td>
    </tr>
  </tbody>
</table>

<?php include'getdoctors.php'; ?>
<input name="enter" type="enter" value="Get Doctors">
</form>

<hr>
<form action="getdocfromlicense.php" method="post">
<br>
<u>Get Doctor Qualified  Before License Date:</u>
<p>Enter the date in this format: 1998-20-30
<br>
License Date: <input type="text" name="licdate">
<br>
<input type="submit" value="Get Doctor">
</form>

<hr>
<form action="addnewdoc.php" method="post" enctype="multipart/form-data">
<br>
<u>Add a New Doctor:</u>
<br>
<br>
First Name: <input type="text" name="fname">
<br>
Last Name: <input type="text" name="lname">
<br>
Specialty: <input type="text" name="spec">
<br>
License Date (ex. 2000-20-20): <input type="text" name="licDate">
<br>
License Number (ex. HW10): <input type="text" name="licNum">
<br>
Hospital:<br>
<input type="radio" name="hospital" value="ABC">Victoria, London ON<br>
<input type="radio" name="hospital" value="BBC">St.Joseph, London ON<br>
<input type="radio" name="hospital" value="DDE">Victoria, Victoria BC<br>
Add Doctor's Image:<br>
<input type="file" name="file" id="file"><br>
<input type="submit" value="Add Doctor">
</form>

<hr>
<form action="deletedoc.php" method="post">
<br>
<u>Delete a Doctor:</u>
<br>
<br>
First Name: <input type="text" name="fname">
<br>
Last Name: <input type="text" name="lname">
<br>
License Number (ex. HW10): <input type="text" name="licNum">
<br>
<input type="submit" value="Delete Doctor">
</form>

<hr>
<form action="updatehospital.php" method="post">
<br>
<u>Update a Hospital Name:</u>
<br>
<br>
Victoria, London ON: <input type="radio" name="hospital" value="ABC">
<br>
St. Joseph's, London ON: <input type="radio" name="hospital" value="BBC">
<br>
Victoria, Victoria BC: <input type="radio" name="hospital" value="DDE">
<br>
What did you want to change the name to?<br>
<input type="text" name="hospName">
<input type="submit" name="submit" value="Update Hospital Name">
</form>

<hr>
<form action="headdoctor.php" method="post">
<br>
<u>List All Head Doctors and Their Start Date for Each Hospital in Alphabetical Order:</u><br>
<br>
<input type="submit" name="submit" value="List">
</form>

<hr>
<form action="getpatientbyohip.php" method="post">
<br>
<u>Get Patient and Assigned Doctor by OHIP Number:</u>
<p>Enter the OHIP Number: 
<br>
<input type="text" name="ohip">
<br>
<input type="submit" value="Get Patient Info">
</form>

<hr>
<form action="updatepatientlist.php" method="post">
<br>
<u>Enter Doctor and Patient Name to Assign or Remove Doctor:</u></br></br>
Doctors:<br>
<?php
   $query = "SELECT * FROM doctor";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Database query failed. Could not retrieve doctors.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
	
echo "<br>";
echo "Patients:";
echo "<br>";
   $query = "SELECT * FROM patient";
   $result1 = mysqli_query($connection,$query);
   if (!$result) {
        die("Database query failed.");
    }
   while ($row = mysqli_fetch_assoc($result1)) {
        echo '<input type="radio" name="patient" value="';
        echo $row["OHIPNumber"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result1);
?>
<input type="submit" name="submitAssign" value="Assign Doctor to Patient">
<input type="submit" name="submitRemove" value="Remove Doctor from Patient">
</form>

<hr>
<form action="getdocnopatients.php" method="post">
<br>
<u>List All Doctors With no Patients:</u><br>
<br>
<input type="submit" name="submit" value="List">
</form>

<hr>
<form action="updatedocpic.php" method="post" enctype="multipart/form-data">
<u>Add a Doctor's Missing Image:</u><br>
<?php
   include 'uploaddocpic.php';
   include 'adddocpic.php';
?>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submitImage" value="Add Picture">
<?php
mysqli_close($connection);
?>
</form>
<hr>
</body>
</html>
