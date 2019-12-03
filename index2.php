<!--This is the home page of the doctor's Database-->
<!DOCTYPE html>
<html>
<head>
  <title>Zeel's Doctor's Database</title>
  <link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>
  <h1>Zeel's Doctor Database</h1> <!-- Header-->
    <!-- If the user chooses to sort the doctor names, display the results in the the get doctors page-->
  <form action="getdoctors.php" method="post">
   <!-- Display all the possible ways to sort the names and give the user radio button choices to select.
        The user hits the get doctors button to get the results.-->
      <table style="width: 100%;">
      <tbody>
        <tr>
          <td style="width: 50.0000%;">
            <div style="text-align: center;"><strong>Sort By:</strong></div>
          </td>
          <td style="width: 24.9624%;">
            <div>
              <input name="radio" id="1" type="radio" value="First Name A-Z" checked="checked">First Name A-Z
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
              <input name="enter" type="submit" value="Get Doctors" class="fr-rounded"><!-- Enter Button -->
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
    
<!-- Get the doc before a certain date-->    
  <form action="getdoclic.php" method="post"><!-- go to the doc license info page-->
    <h3 style="text-align: center;">
      <br>
      <br>Want a Doctor who was licensed before a certain date?
    </h3>
    <p style="text-align: center;">Enter the license date in this format: YYYY-MM-DD
      <br>
        <!--Text box and then the submit button-->
      <input type="text" name="licdate" value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
      <input type="submit" value="Get Doctor">
    </p>
  </form>
    
    <!-- Add a new doc-->
    <form action="adddoc.php" enctype="multipart/form-data" method="post"><!-- Go to add doc page-->
    <br>
    <h3 style="text-align: center;">Add a New Doctor</h3>
    <table style="width: 100%;">
      <tbody>
        <tr>
          <td style="width: 63.964%;">
            <div style="text-align: center;"><strong>Info</strong></div>
          </td>
          <td style="width: 35.8858%;">
            <div style="text-align: left;"><strong>Hospital</strong></div><!-- select the hospital the doc works at (St.Joes is auto checked) -->
          </td>
        </tr>
        <tr>
          <td style="width: 63.964%;">
            <div style="text-align: center;">First Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
              <input type="text" name="fName" value=""><!--Text Input Box-->
              <br>Last Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <input type="text" name="lName" value=""><!--Text Input Box-->
              <br>Specialty:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <input type="text" name="spec" value=""><!--Text Input Box-->
              <br>License Number (ex. SD98):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <input type="text" name="licNum" value=""><!--Text Input Box-->
              <br>License Date (YYYY-MM-DD):&nbsp; &nbsp;
              <input type="text" name="licDate" value=""><!--Text Input Box-->
            </div>
          </td>
          <td style="width: 35.8858%;">
            <div style="text-align: left;">
              <br>
              <input type="radio" name="hosp" value="BBC" checked="checked">St.Joseph, London ON
              <br>
              <input type="radio" name="hosp" value="ABC">Victoria, London ON
              <br>
              <input type="radio" name="hospl" value="DDE">Victoria, Victoria BC
              <br>
              <input type="submit" value="Add Doctor">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
    
    <!-- Delete the Doctor inputed by  the user -->
  <form action="deletedoc.php" method="post"><!-- call delete doc page-->
    <h3 style="text-align: center;">
      <br>Delete a Doctor:
    </h3>
    <p>
      <br>
    </p>
    <p>
      <br>
    </p>
    <p>First Name: 
      <input type="text" name="fname" value=""> <!-- Doctor Name Input Text Box-->
      <br>Last Name: 
      <input type="text" name="lname" value=""> 
      <br>License Number (ex. SD98): 
      <input type="text" name="licNum" value=""><!-- License Num Text Box-->
    </p>
    <p>
      <input type="submit" name = "enter" value="Delete Doctor"><!-- Delete Button-->
    </p>
  </form>
    
    <!-- Update the hospital name-->
    <form action="updatehospname.php" method="post" style="text-align: center;"><!-- go to the updatehospname.php-->
  <h3 style="text-align: center;">
    <br>Update a Hospital Name:
  </h3>
  <p>
    <br>
  </p> <!-- pick the name you want to update-->        
<?php
    include 'connecttodb.php';
    
    $query = ' SELECT name, province, city, hosCode FROM hospital;'; //get's info of the doctor specified by the user
    $result=mysqli_query($connection,$query);// send query into the db 
    if (!$result) {
          die("Database Query Fail");
   }
         while ($row=mysqli_fetch_assoc($result)) {
        echo "<p style='text-align: left;'>";
        echo "<br>".$row["name"] . " " . $row["city"] ." ". $row["province"];
        echo"<input type='radio' name='hosp' value='".$row["hosCode"]."'>" ;
        echo"</p>"; 
        
     }
  
     mysqli_close($connection);
    
?> 
  <p style="text-align: left;">

  </p>
  <p style="text-align: left;">
    <br>What did you want to change the name to?
    <br>
    <input type="text" name="hospName" value=""> 
    <input type="submit" name="submit" value="Update Hospital Name">
  </p>
  </form>
    
    <!--Get the hospital's info--> 
  <form action="hosplist.php" method="post">
      <h3 style="text-align: center;"> 
    <br>Hospital Info List 
     </h3>
    <p style="text-align: center;">
      <br> 
    <input type="submit" name="submit" value="Check it out">  
  </p> 
  </form>
  
<!-- Get the patients info based on their ohip -->    
  <form action="getpatientinfo.php" method="post" >
      <h3 style="text-align: center;">
    <br>Get Patient Info
    </h3>
    <p style="text-align: center;">Enter Patient Id (OHIP No.)
      <br>
      <input type="text" name="ohip" value="">
      <br>
      <input type="submit" value="Get Patient Info">
    </p>
    </form>
    
<!-- Assign/Remove a adoc from a patient-->    
  <form action="assigndoc.php" method="post">
    <h3 style="text-align: center;">Add/Remove Doctor to a Patient</h3>
  <p style="text-align: left;">DoctorID: <!-- doc license num-->
    <input type="text" name="doc" value="">
    <br>PatientID: <!-- ohip num -->
    <input type="text" name="ohip" value="">
  </p>
  <p style="text-align: left;">Add or Remove? <!-- Prompt user to pick a button-->
    <input type="submit" name="add" value="Add"> 
    <input type="submit" name="remove" value="Remove">
  </p>
      
      <!-- get docs with no patients-->
    </form>
    <form action="getdocnopat.php" method="post" >
   <h3 style="text-align: center;">List Doctors with No Patients</h3>
    <p style="text-align: center;">
      <br>
      <input type="submit" name="submit" value="Check it out">
    </p>
  </form>
</body>
</html>

