<?php
include 'dbconnect.php';
include 'menu.php';


echo "<table border=1>";
echo "<tr><th>Id</th><th>Name</th><th>email</th><th></th></tr>";
if ($result = $mysqli->query("SELECT * from Patron")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["id"];
         echo "</td><td>";
         echo $row["name"];
         echo "</td><td>";
         echo $row["email"];
         echo "</td><td><a href=delpatron.php?id=";
         echo $row["id"];
         echo ">DEL</a> &nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<a href=addpatron.php?id=";
         echo $row["id"];
         echo ">EDIT</a>";

         echo "</td></tr>";
    }
echo "</table>";    

}
?>
<a href=addpatron.php>Add New</a></br>
<a href=patrons.php>Refresh</a></br>