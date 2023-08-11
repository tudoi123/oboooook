<?php
$con = mysqli_connect("us-cdbr-east-06.cleardb.net","bb8fd0e69abcc4","abc1ef46","heroku_c9c3c865a304ebb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	  // Change character set to utf8
	mysqli_set_charset($con,"utf8");

	
?>