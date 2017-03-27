<?php

include 'dbconnect.php';


     $UniversityName = $_REQUEST['University'];
     $Name = $_REQUEST['BuildingName'];
     $Location = $_REQUEST['Location'];
     $NumRooms = $_REQUEST['NumRooms'];
     $NumStudents = $_REQUEST['NumStudents'];

     
     IF($Name != ''){
     $sql = "INSERT INTO Building (Name, Location, NumRooms, NumStudents, University) VALUES ('" . $Name . "','";
     $sql .= $Location . "','" . $NumRooms . "','" . $NumStudents . "','" . $UniversityName . "')";
     

     $mysqli->query($sql);
     }

echo "<table border=1>";
echo "<tr><th>Name</th><th>Location</th><th>Number of Rooms</th><th>Capacity of Students</th><th>University</th><th>Current # of Students</th><th>Staff/Student Ratio</th></tr>";
if ($result = $mysqli->query("SELECT * from Building WHERE University = '$UniversityName'")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    
    	 $name = str_replace(" ", "%20", $row["Name"]);
    	 $universityname = str_replace(" ","%20", $row["Univrsity"]);
    	 $result4 = $mysqli->query("SELECT COUNT(*) as total from Staff WHERE Building='" . $row["Name"] . "'");
         $row4 = $result4->fetch_array(MYSQLI_ASSOC);
    	 $StaffCount = $row4['total'];
    	 
    	 $result5 = $mysqli->query("SELECT COUNT(*) as total from Student WHERE Building='" . $row["Name"] . "'");
         $row5 = $result5->fetch_array(MYSQLI_ASSOC);
    	 $StudentCount = $row5['total'];
    	 
         $result3 = $mysqli->query("SELECT StaffRatio (". $StaffCount . " ,".  $StudentCount . " ) as total");
         $ratio = $result3->fetch_array(MYSQLI_ASSOC);
         
         echo "<tr><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["Location"];
         echo "</td><td>";
         echo $row["NumRooms"];
	 echo "</td><td>";
	 echo $row["NumStudents"];
	 echo "</td><td>";
         echo $row["University"];
         echo "</td><td>";
         $result2 = $mysqli->query("SELECT COUNT(*) as total from Student WHERE Building='" . $row["Name"] . "'");
         $row2 = $result2->fetch_array(MYSQLI_ASSOC);
         echo $row2['total'];
         echo "</td><td>";
         echo $ratio['total'];
         echo "</td><td>";
         echo "<a href=addstudent.php?building=" . $name . "><button>Add Student</button></a>";
         echo "</td><td>";
         echo "<a href=students.php?BuildingName=" . $name . "><button>View Students</button></a>";
         echo "</td><td>";
         echo "<a href=staff.php?BuildingName=" . $name . "><button>View Staff</button></a>";
         echo "<a href=addstaff.php?BuildingName=" . $name . "><button>Add Staff</button></a>";
         echo "</td><td>";
         echo "<a href=editbuilding.php?BuildingName=" . $name . "&University=" . $universityname . "&Location=" . $row['Location'] . "&NumRooms=" . $row['NumRooms'] . "&NumStudents=" . $row['NumStudents'] . "><button>Edit Building</button></a>";
         echo "<a href=deletebuilding.php?BuildingName=" . $name . "><button>Delete Building</button></a>";
         echo "</td></tr>";
         
         
         

         

    }
    }

echo "</table>";    

$name = str_replace(' ', '%20', $UniversityName);

 echo "<a href=addbuilding.php?name=" . $name . "><button>Add Building</button></a>";


?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>