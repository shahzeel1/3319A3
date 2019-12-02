<!DOCTYPE html>
<html>
<head>
  <title>Zeel's Doctor's Database</title>
  <link rel="stylesheet" type="text/css" href="doctordb.css">
  <link href="https://fonts.google.com/specimen/Fjalla+One">
  <script src="doctors.js"></script>
</head>
<body>
  <h1 style="text-align: center;"><span style="font-family: Verdana, Geneva, sans-serif;">Zeel's Doctor Database</span></h1>
  <form action="getdoctors.php" method="post">
    <table style="width: 100%;">
      <tbody>
        <tr>
          <td style="width: 50.0000%;">
            <div style="text-align: center;"><strong>Sort By:</strong></div>
          </td>
          <td style="width: 24.9624%;">
            <div>
              <input name="radio" id="1" type="radio" value="First Name A-Z">First Name A-Z
            </div>
            <br>
            <div>
              <input name="radio" id="2" type="radio" value="Last Name A-Z">Last Name A-Z
            </div>
            <br>
            <div>
              <input name="radio" id="3" type="radio" value="First Name Z-A">First Name Z-A
            </div>
            <br>
            <div>
              <input name="radio" id="4" type="radio" value="Last Name Z-A">Last Name Z-A
            </div>
          </td>
          <td style="width: 24.9624%;">
            <div data-empty="true" style="text-align: center;">
              <br>
              <input name="enter" type="submit" value="Get Doctors" class="fr-rounded">
            </div>
          </td>
        </tr>
      </tbody>
    </table><!--?php include'getdoctors.php'; ?-->
  </form>
  <form action="getdoclic.php" method="post">
    <h3 style="text-align: center;">
      <br>
      <br>Want a Doctor who was licensed before a certain date?
    </h3>
    <p style="text-align: center;">Enter the license date in this format: YYYY-MM-DD
      <br>
      <input type="text" name="licdate" value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
      <input type="submit" value="Get Doctor">
    </p>
  </form>
  <form action="adddoc.php" enctype="multipart/form-data" method="post">
    <h3 style="text-align: center;">
      <br>
    </h3>
    <h3 action="adddoc.php" enctype="multipart/form-data" method="post" style="text-align: center;">Add a New Doctor</h3>
    <p>First Name: 
      <input type="text" name="fName" value="">
      <br>Last Name: 
      <input type="text" name="lName" value="">
      <br>Specialty: 
      <input type="text" name="spec" value="">
      <br>License Number (ex. HW10): 
      <input type="text" name="licNum" value="">
      <br>License Date (YYYY-MM-DD): 
      <input type="text" name="licDate" value="">
      <br>
      <br>Hospital:
      <br>
      <input type="radio" name="hosp" value="BBC" checked="checked">St.Joseph, London ON
      <br>
      <input type="radio" name="hosp" value="ABC">Victoria, London ON
      <br>
      <input type="radio" name="hospl" value="DDE">Victoria, Victoria BC
      <br>Add Doctor's Image:
      <br>
      <input type="file" name="file" id="file" value="">
      <br>
      <input type="submit" value="Add Doctor">
    </p>
  </form>
  <form action="deletedoc.php" method="post">
    <h3 action="deletedoc.php" method="post" style="text-align: center;">
      <br>Delete a Doctor:
    </h3>
    <p>
      <br>
    </p>
    <p>
      <br>
    </p>
    <p>First Name: 
      <input type="text" name="fname" value="">
      <br>Last Name: 
      <input type="text" name="lname" value="">
      <br>License Number (ex. HW10): 
      <input type="text" name="licNum" value="">
    </p>
    <p>
      <input type="submit" value="Delete Doctor">
    </p>
  </form>
    <form action="updatehospname.php" method="post" style="text-align: center;">
  <h3 style="text-align: center;">
    <br>Update a Hospital Name:
  </h3>
  <p>
    <br>
  </p>
  <p style="text-align: left;">
    <br>St. Joseph's, London ON: 
    <input type="radio" name="hosp" value="BBC">
    <br>Victoria, London ON: 
    <input type="radio" name="hosp" value="ABC">  
    <br>Victoria, Victoria BC: 
    <input type="radio" name="hosp" value="DDE">
  </p>
  <p style="text-align: left;">
    <br>What did you want to change the name to?
    <br>
    <input type="text" name="hospName" value=""> 
    <input type="submit" name="submit" value="Update Hospital Name">
  </p>
  </form>
  <form action="hosplist.php" method="post">
      <h3 style="text-align: center;"> 
    <br>Hospital Info List 
     </h3>
    <p style="text-align: center;">
      <br> 
    <input type="submit" name="submit" value="Check it out">  
  </p> 
  </form>
  <hr>
  <form action="getpatientbyohip.php" method="post">
    <br><u>Get Patient and Assigned Doctor by OHIP Number:</u>
    <p>Enter the OHIP Number:
      <br>
      <input type="text" name="ohip" value="">
      <br>
      <input type="submit" value="Get Patient Info">
    </p>
  </form>
  <hr>
  <form action="updatepatientlist.php" method="post">
    <br><u>Enter Doctor and Patient Name to Assign or Remove Doctor:</u>
    <br>
    <br>Doctors:
    <br><!--?php
   $query = "SELECT * FROM doctor";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("Database query failed. Could not retrieve doctors.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["licenseNum"];
        echo '"-->' . $row["firstName"] . " " . $row["lastName"] . "
    <br>"; } mysqli_free_result($result); echo "
    <br>";
echo "Patients:";
echo "
    <br>"; $query = "SELECT * FROM patient"; $result1 = mysqli_query($connection,$query); if (!$result) { die("Database query failed."); } while ($row = mysqli_fetch_assoc($result1)) { echo '
    <input type="radio" name="patient" value="';
        echo $row[">' . $row["firstName"] . " " . $row["lastName"] . "
    <br>"; } mysqli_free_result($result1); ?&gt; 
    <input type="submit" name="submitAssign" value="Assign Doctor to Patient"> 
    <input type="submit" name="submitRemove" value="Remove Doctor from Patient">
  </form>
  <hr>
  <form action="getdocnopatients.php" method="post">
    <br><u>List All Doctors With no Patients:</u>
    <br>
    <br>
    <input type="submit" name="submit" value="List">
  </form>
  <hr>
  <form action="updatedocpic.php" enctype="multipart/form-data" method="post"><u>Add a Doctor's Missing Image:</u>
    <br><!--?php
   include 'uploaddocpic.php';
   include 'adddocpic.php';
?--> 
    <input type="file" name="file" id="file" value="">
    <br>
    <input type="submit" name="submitImage" value="Add Picture"> <!--?php
mysqli_close($connection);
?-->
  </form>
  <hr>
</body>
</html>