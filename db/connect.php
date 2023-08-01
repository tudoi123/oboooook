<?php
$con = mysqli_connect("us-cdbr-east-06.cleardb.net","b1c39203325275","2d57df93","heroku_b1e23109d0592c5");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	  // Change character set to utf8
	mysqli_set_charset($con,"utf8");

	
?>