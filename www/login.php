<?php

require_once("settings.php");

//print_r($_REQUEST);
// login.tpl
// echo 'login!';
//print_r($_COOKIE[calac_db]);

// print_r($_REQUEST);

if ($_REQUEST[post_email] == NULL && $_REQUEST[post_pwd] == NULL)
{
	$smarty->assign("redirect",$_REQUEST[redirect],true);
	$smarty->display('login.tpl');
}
else
{

$search_string1 = preg_replace("/[^A-Za-z0-9_@.-]/", " ", $_REQUEST[post_email]);
$search_string1 = $calac_db->real_escape_string($search_string1);

$search_string2 = preg_replace("/[^A-Za-z0-9_@.-]/", " ", $_REQUEST[post_pwd]);
$search_string2 = $calac_db->real_escape_string($search_string2);

		$query = ("
SELECT * FROM `users` WHERE 
`user_email` = '".$search_string1."' 
AND `user_pwd` = md5('".$search_string2."') 

	");

	$result = $calac_db->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	if ( $result_array == null)	
	{
// == WRONG PASSWORD
//	echo $query;
		header("Location: /login/?redirect=".$_REQUEST[REQUEST_URI]."&password=bad");
	}
	else
	{
// Update Section

$search_string3 = preg_replace("/[^A-Za-z0-9_]/", " ", $_COOKIE[calac_db]);
$search_string3 = $calac_db->real_escape_string($search_string3);
	$query = ("
	
	INSERT INTO `session` (`session_id`, `session_data`, `session_user_id`) 
	VALUES (NULL, '" . $search_string3 . "', '" . $result_array[0][user_id]  . "');
	");

		$result = $calac_db->query($query);
		if ($_REQUEST[redirect] == NULL)
		{
			header("Location: /"); 
		}else
		{
			header("Location: /".$_REQUEST[redirect]); 
		}
		exit();
	}
}
?>