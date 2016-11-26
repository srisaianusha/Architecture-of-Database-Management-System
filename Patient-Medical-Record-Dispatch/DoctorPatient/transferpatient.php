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
<title>Patient Details</title>
</head>
<body>
<h1>Patient Details</h1>
<table>
  <tr>
    
    <th>Patient Name</th>
    <th>Patient Since</th>
    <th>Delete</th>
    <th>Transfer</th>
  </tr>
  <tr>
  	<?php
  		require('db.php');
  		$count=1;
  		$query = "SELECT * FROM users WHERE usertype = 'P' ORDER BY firstname, lastname";
		$result = mysqli_query($con,$query);
  		while($row = mysqli_fetch_assoc($result)){
  			$user_id = $row["id"];
  			$firstname = $row["firstname"];
  			$lastname = $row["lastname"];
  			$trn_date = $row["trn_date"];
  	?>
  	
  	<td><?php echo $firstname." ".$lastname; ?></td>
  	<td><?php echo date('Y-m-d', strtotime($trn_date)); ?></td>
  
  	<td>
        <form name="deleteuser" action="deleteuser.php" method="POST">
            <input type="hidden" name="userid" value="<?php echo $user_id; ?>"/>
            <input type="submit" name="deleteuser" value="Delete"/>
        </form>
      </td> 
      <td>
        <form name="transfer" action="transfer.php" method="POST">
            <input type="hidden" name="userid" value="<?php echo $user_id; ?>"/>
            <input type="submit" name="transfer" value="Transfer"/>
        </form>
      </td> 
  </tr>
  
  	<?php $count++;} ?>
</table>
<br>
<a href="dashboard.php">Back to home</a>

</body>
</html>

