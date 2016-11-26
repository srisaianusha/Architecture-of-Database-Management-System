<?php

require('db.php');

$stmt = $con->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param('i', $_POST['userid']);
$stmt->execute();

header('location: transferpatient.php');

?>