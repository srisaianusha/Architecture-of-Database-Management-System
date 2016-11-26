<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

h1	{
	font-family: arial, sans-serif;
	text-align: center; 
}
</style>
<title>Ordered Test Details</title>
</head>
<body>
<h1>Patient Test Details</h1>
<table>
  <tr>
    
    <th>Patient Name</th>
    <th>Ordered Test</th>
    <th>Ordered By</th>
    <th>Odered On</th>
    <th>Test Notes</th>
    <th>Status</th>
    <th>Performed By</th>
    <th>Performed On</th>
    <th>Test Result</th>
    
  </tr>
  <tr>
  	<?php
  		require('_db.php');
  		$sql = 'SELECT * FROM tests WHERE patient_name = :patient_name ORDER BY trn_date DESC';
  		$stmt = $db->prepare($sql);
  		$stmt->bindParam(':patient_name', $_POST['patientname'], PDO::PARAM_STR); 
  		$stmt->execute();
  		$result = $stmt->fetchAll();
  		if(!$result)
  		{
  			echo "No such patient";
  		}
  		else{
  		//print_r($result);
  		
  		foreach($result as $row){
  			$patient_name = $row[2];
  			$test_type = $row[4];
  			$doctor_name = $row[1];
  			$order_date = $row[6];
  			$notes = $row[5];
  			$status = $row[7];
  			$performed_by = $row[8];
  			$performed_on = $row[9];
  			$test_result = $row[10];
  	?>
  	<td><?php echo $patient_name; ?></td>
  	<td><?php echo $test_type; ?></td>
  	<td><?php echo $doctor_name; ?></td>
  	<td><?php echo date('Y-m-d H:i:s', strtotime($order_date)); ?></td>
  	<td><?php echo $notes; ?></td>
  	<td><?php echo $status; ?></td>
  	<td><?php echo $performed_by; ?></td>
  	<td><?php echo $performed_on; ?></td>
  	<td><?php echo $test_result; ?></td>
  </tr>
  
  	<?php }} ?>
</table>
<br>
<a href="searchpatient.php">Go Back</a> <br>
<a href="dashboard.php">Go Back Home</a>
</body>
</html>

