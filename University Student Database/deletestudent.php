<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['StudentID'];

$mysqli->query("DELETE FROM Student WHERE ID='"  . $StudentID ."'");






?>

<script>
window.location = 'university.php';
</script>