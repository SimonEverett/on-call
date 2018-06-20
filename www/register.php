<?php
require_once("settings.php");
if(isset($_POST))
{

$query = "INSERT INTO users(fullname,user_name,password)   VALUES (' " . mysqli_real_escape_string($con, $_POST['fullname']) . "', '" . mysqli_real_escape_string($con, $_POST['user_name'])."','".md5($_POST['password'])."')";

//echo $query;

$result = mysqli_query($con,$query);

	if($result)
	{
	echo "<script>window.location='index.php?msg=successfully inserted ';</script>";
	}
	
mysqli_close($con);
}
?> 