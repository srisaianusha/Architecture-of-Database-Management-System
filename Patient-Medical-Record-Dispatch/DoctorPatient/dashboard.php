<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<h1>Dashboard</h1>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
    <?php
   if($_SESSION['usertype'] == 'P'){ ?>
   	<p><a href="patienttests.php">Previous Tests and Results</a></p>
       <p><a href="patient.php">Patient-Schedule an Appointment</a></p>
    <?php } ?>
  
    <?php
    if($_SESSION['usertype'] == 'D'){ ?>
    	<!-- Create a page to display previous appointments and test reports by searhing the patient unique ID-->
    	<p><a href="testorder.php">Order A Test</a></p>
       <p><a href="doctor.php">Doctor-Review Scheduled Appointments</a></p>
       <p><a href="searchpatient.php">Search A Patient</a></p>
    <?php } ?>
    
    
    <?php
    if($_SESSION['usertype'] == 'L'){ ?>
       <p><a href="testdata.php">Lab Technician-View Ordered Tests</a></p>
    <?php } ?>
    
    <?php
    if($_SESSION['usertype'] == 'A'){ ?>
       <!-- Transfer patient page -->
       <p><a href="transferpatient.php">Transfer Patient</a></p>
       <p><a href="manager.php">Manager-Manage Doctor Schedules</a></p>
    <?php } ?>
    
    
    
<p><a href="index.php">Home</a></p>

<a href="logout.php">Logout</a>
    
    
</div>
</body>
</html>
