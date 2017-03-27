<?php

include 'dbconnect.php';

$GuestID = $_REQUEST['GuestID'];

$mysqli->query("DELETE FROM Guests WHERE ID='"  . $GuestID ."'");

echo "DELETE FROM Guests WHERE Name='"  . $GuestName ."'";





?>

<script>
window.location = 'university.php';
</script>