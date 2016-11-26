<?php

require('db.php');
//require('_db.php');
require('db1.php');
//require('_db1.php');


$values = Array();

$id=$_REQUEST['userid'];
$query = "SELECT * from users WHERE id='".$id."'"; 

$result = mysqli_query($con, $query) or die ( mysqli_error());

//$row = mysqli_fetch_assoc($result);



//$stmt = $con->prepare("SELECT id, username, firstname, lastname, email, password, usertype, trn_date FROM hospitalb.users WHERE id = ?");
//$stmt->bind_param('i', $_POST['userid']);
//$data = mysqli_query($con,$stmt);

//$row = mysqli_fetch_assoc($data);
while($row = mysqli_fetch_assoc($result)){
	$row['id'] = mysqli_real_escape_string($con,$row['id']);
    $row['username'] = mysqli_real_escape_string($con,$row['username']);
    $row['firstname'] = mysqli_real_escape_string($con,$row['firstname']);
    $row['lastname'] = mysqli_real_escape_string($con,$row['lastname']);
    $row['email'] = mysqli_real_escape_string($con,$row['email']);
    $row['password'] = mysqli_real_escape_string($con,$row['password']);
    $row['usertype'] = mysqli_real_escape_string($con,$row['usertype']);
    $row['trn_date'] = mysqli_real_escape_string($con,$row['trn_date']);
    $values[] = "('$row[id]','$row[username]','$row[firstname]','$row[lastname]','$row[email]','$row[password]','$row[usertype]','$row[trn_date]')";

    mysqli_query($con,"INSERT into hospitalc.users (id, username, firstname, lastname, email, password, usertype, trn_date) VALUES ".implode(',',$values)."");
}  
/*
$query = 'DELETE FROM tests WHERE test_id = :testid';
$stmt = $db->prepare($query);
$stmt->bindParam(':testid',$_POST['testid'], PDO::PARAM_INT);
$stmt->execute();
*/
header('location: transferpatient.php');

?>