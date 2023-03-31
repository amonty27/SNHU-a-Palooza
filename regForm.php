<?php

// create the conection requirments to connect to database
$con = mysql_connect(':mysql', 'test2','123');

// if the connection is not valid, print error message
if (!$con){
  die("Connection Failed: " . mysql_error());
}


// select the database that has the correct table
mysql_select_db('CIT647StudentsConcertsProfiles',$con);

// create a string that will be used for the random id
$pattern = "1234567890";
$RowID = $pattern{rand(0,10)};
// for 9 times, the rowID loop will chose a random number beteween 0-9 and add it to the end of the string
for($i = 1; $i <10; $i++){
  $RowID .= $pattern{rand(0,10)};
}

// create the sql query that will be use to insert the new values into the table
$sql = "INSERT INTO CIT647StudentsConcertProfilesTable (RowNum, LastName, FirstName, PhoneNum) VALUES ('$RowID','$_POST[LastName]','$_POST[FirstName]', '$_POST[PhoneNum]')";

// get the values to display in the confirmation page
$First = $_POST[FirstName];
$Last = $_POST[LastName];
$Phone = $_POST[PhoneNum];
$Email = $_POST[Email];

// FOR TESTING ONLY - returns messages if the query completed or not
if (mysql_query($sql, $con)){
  //echo "Records added successfully.";
}
else{
  //echo "ERROR: Not able to execute $sql. " . mysql_error($con);
}

// close the connection to the database
mysql_close($con);
?>

<!-- the html that will display for the confirmation page -->
<br><center><h1>We've recieved your information.</h1></center>
<br><br>
<center>
Thank you for submitting your information for the concert. <br>
Make sure to print a copy of the following information for your records. <br>
including the following confirmation ID which will be used to print <br>
a ticket for you when you arrive at the ticket booth. <br>
<br>

<?php
  echo "Confirmation Number: " . $RowID . "<br>";
  echo "Firt Name: " . $First . "<br>";
  echo "Last Name: " . $Last . "<br>";
  echo "Phone Number: " . $Phone . "<br>";
  echo "Email: " . $Email . "<br>";
?>

<br>
<input type = "button" onClick="window.print()" value="Print This Page"/>
<br><br> <a href=index.html>Return to the homepage<a/>