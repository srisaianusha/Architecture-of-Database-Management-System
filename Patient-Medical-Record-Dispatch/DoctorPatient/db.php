<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

$host = "127.0.0.1";
//$port = 3306;
$username = "root";
$password = "";
$database = "hospitalB";


//$con = mysqli_connect("localhost","root","","hospitalA");
$con = mysqli_connect($host,$username,$password);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 // session_start();

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
$con->query($sql);

/*
if ($con->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $con->error;
}


*/
// Create connection
$con = mysqli_connect($host,$username,$password,$database);

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
usertype VARCHAR(5) NOT NULL,
trn_date DATETIME NOT NULL
)";


$con->query($sql);


?>