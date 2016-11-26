
<?php
require('_db.php');
//session_start();
$sql = 'SELECT * FROM tests WHERE test_id = :testid';
$stmt = $db->prepare($sql);                                         
$stmt->bindParam(':testid', $_POST['testid'], PDO::PARAM_INT);
// use PARAM_STR although a number  
   
$stmt->execute(); 

$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Test Order Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php

//$status1 = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

//$performed_by = $_
$trn_date = date("Y-m-d H:i:s");
$sql = 'UPDATE tests SET status = :status, performed_on = :trn_date, performed_by = :performed_by, test_result = :test_result WHERE test_id = :testid';
$stmt = $db->prepare($sql);                                  
$stmt->bindParam(':status', $_POST['status'], PDO::PARAM_STR);  
$stmt->bindParam(':trn_date', $trn_date, PDO::PARAM_STR);  
$stmt->bindParam(':testid', $_POST['id'], PDO::PARAM_STR);
$stmt->bindParam(':performed_by', $_POST['labtechnicianname'], PDO::PARAM_STR);
$stmt->bindParam(':test_result', $_POST['test_result'], PDO::PARAM_STR);
// use PARAM_STR although a number  
   
$stmt->execute(); 




header('location: testdata.php');



//$status1 = "Record Updated Successfully. </br></br>
//<a href='testdata.php'>View Updated Record</a>";
//echo '<p style="color:#FF0000;">'.$status1.'</p>';
}else {
?>
<div class="form">
	<h1>Update Test Order Form</h1>
	<form name="testorder" action="" method="post">
	
	<input type="hidden" name="new" value="1" />
	<input name="id" type="hidden" value="<?php echo $row['test_id'];?>" />

	<p><span class="error">* required field.</span></p>
	
	
	Lab Technician Name: <input type="text" name="labtechnicianname" value="<?php echo ($_SESSION['username']); ?>" required readonly/>
	<span class="error">* </span><br><br>
	
	Physician Name: <input type="text" name="doctorname" value="<?php echo ($row['doctor_name']); ?>" required readonly/>
	<span class="error">* </span><br><br>
	Patient Name: <input type="text" name="patientname" value="<?php echo ($row['patient_name']); ?>" required readonly/>
	<span class="error">* </span> <br><br>

	Referred Test:
	<select name="testtype" value="" required readonly/>
		 <option value=""><?php echo ($row['test_type']); ?></option>
	</select>
	<span class="error">* </span><br><br>
	Notes: <textarea name="notes" cols="50" rows="5" wrap="physical" value="" readonly><?php echo htmlspecialchars(($row['notes'])); ?>
	</textarea>
	<br>
	Status: <input type="text" name="status" value="Open" required>
	<span class="error">* </span><br><br>
	
	Test Result: <textarea name="test_result" cols="50" rows="5" wrap="physical" value="" required></textarea>
	<span class="error">* </span><br><br>
	
	
	<input type="submit" name="submit" value="Update Order Test"/><br>
	
	<a href="testdata.php">Back to test data</a>
	</form>
</div>
<?php } ?>
</body>
</html>