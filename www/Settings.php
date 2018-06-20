<?php

$domain_name = "BEMROSE\\";

// SET UP MYSQL CONNECTION
$dsn = 'mysql:dbname=' . $_SERVER["MYSQL_DBNAME"] . ';host=' . $_SERVER["MYSQL_HOST"];

//initialize the connection to the database
$conn = new PDO($dsn, $_SERVER["MYSQL_USERNAME"], $_SERVER["MYSQL_PASSWORD"]);



/*
Username Sync settings
---------------------
Workaround due to odd username prefixs

USER GROUP BINDING

Year 7: 2009jbloggs
Year 8: 2008jbloggs
Year 9: 14jbloggs
Year 10: 13jbloggs
Year 11: 12jbloggs
Year 12: 2004jbloggs
Year 13: 10jbloggs
*/
// 2009jbloggs 
			if ( $argv['2'] ==  7 || $argv['2'] == 8 || $argv['2'] == 12 )
//                    YEAR --- ^^^				
			{
//-- MASK USERNAMES Start WITH A NUMBER  severett02 = (\A[^0-9][^0-9])
				$regex = '(\A[0-9][0-9][0-9][0-9])';
			}
			elseif ( $argv['2'] ==  9 || $argv['2'] == 10 || $argv['2'] == 11 || $argv['2'] == 13)
			{
//-- MASK USERNAMES ENDING WITH A NUMBER  severett02 = (\A[^0-9][^0-9])
				$regex = '(\A[0-9][0-9])';
			}



	$ROOMS[] = "-- Select your room --";
/*
 *
 * ROOM SETTINGS 
 * 
 */

for ($i = 2; $i <= 34; $i++) 
{
	$ROOMS[] = "Room " . $i;
}
	
	$ROOMS[] = "Balcony 1";
	$ROOMS[] = "Balcony 2";
	$ROOMS[] = "ERF";
	$ROOMS[] = "Community Lounge 1";
	$ROOMS[] = "Community Lounge 2";
	$ROOMS[] = "Seclusion Room";
	$ROOMS[] = "Main Hall";
	$ROOMS[] = "Sports Hall";
	$ROOMS[] = "Gym";
	$ROOMS[] = "Field";
	$ROOMS[] = "Drama";
	$ROOMS[] = "Reception";
	$ROOMS[] = "Library";
	
for ($i = 1; $i <= 4; $i++) 
{
	$ROOMS[] = "DT " . $i;
}

for ($i = 1; $i <= 3; $i++) 
{
	$ROOMS[] = "AD " . $i;
}

	$ROOMS[] = "Cherrytree";
	$ROOMS[] = "Making Room";
	$ROOMS[] = "Music Room";
//	$ROOMS[] = "Techstyles";
	$ROOMS[] = "Textiles";
	$ROOMS[] = "All Primary";
	$ROOMS[] = "Maths Corridor";
	$ROOMS[] = "Top Corridor";
	$ROOMS[] = "Bottom Corridor";
	$ROOMS[] = "West Turret";
	$ROOMS[] = "East Turret";
	$ROOMS[] = "Boys Changing Room";
	$ROOMS[] = "Girls Changing Room";

	
	$BehaviourType = array( '1' => 'Rude to staff', '2' => 'Shouting out', '3' => 'Refusing to follow instructions', '4' => 'Refusing to sit where asked', '5' => 'Refusing to empty mouth', '6' => 'Late to lesson' , '7' => 'Disrupting others' );	
	

/*
 * 	NOT IN USE 
 * 
$YEARS[] = array("Y9", "ou=Y9,ou=East,dc=MyDomain,dc=com");
$YEARS[] = array("Y10", "ou=Y10,ou=East,dc=MyDomain,dc=com");
$YEARS[] = array("Y11", "ou=Y11,ou=East,dc=MyDomain,dc=com");
$YEARS[] = array("Y12", "ou=Y12,ou=East,dc=MyDomain,dc=com");
*/




$fetched_user_array = NULL;

$user = str_replace( $domain_name , "", $_SERVER['LOGON_USER'] ) ;

// echo "Username = " . $user . "Domain name = " . $domain_name;
// exit();

// $user = "bigbrother";
$fullname = "-- Awaiting sync --";

//-- JUST CHECKING THAT WE HAVE GOT THIS COURSE IN DB..
$sqlSelect = ("SELECT * FROM `users` WHERE `user_name` = :username");
$sth = $conn->prepare($sqlSelect);
$sth->execute( array( ':username' => $user ) );

foreach ($sth->fetchAll() as $row) 
{
	$fetched_user_array[] = $row;
//	echo 'COURSE EXISTS';
}

// echo count( $fetched_user_array );
if ( count( $fetched_user_array ) < 1 )
{
//-- WE NEED TO INCER THIS USER INTO THE DB.

	$sqlSelect = ("INSERT INTO `users` (`fullname`, `user_name`, `dashboad` ) VALUES ( :fullname, :username, '0' ); ");
	$sth = $conn->prepare($sqlSelect);
	$sth->execute( array( ':username' => $user , ':fullname' => $fullname ) );

	//-- JUST CHECKING THAT WE HAVE GOT THIS COURSE IN DB..
	$sqlSelect = ("SELECT * FROM `users` WHERE `user_name` = :username");
	$sth = $conn->prepare($sqlSelect);
	$sth->execute( array( ':username' => $user ) );
	
	foreach ($sth->fetchAll() as $row) 
	{
		$fetched_user_array[] = $row;
	}

			
}elseif ( count( $fetched_user_array ) > 1 ){
// SOMETHING HAS GONE WRONG WE HAVE MORE THAN ONE USER WITH THE SAME USERNAME IN THE DB
	echo 'ERROR MORE THAN ONE USER WITH THIS USERNAME IN THE DB [' .$user . '] <br>';
	echo '<pre>';
	print_r($_SESSION);
	exit();
}

// echo "<pre>";

//print_r ( $fetched_user_array["0"]["user_name"] );

$slt_users = array_map('str_getcsv', file('slt_users.txt'));

foreach ( $slt_users["0"] as $key => $value) 
{
	if ( $value == $fetched_user_array["0"]["user_name"] )
	{
		$fetched_user_array["0"]["slt"] = true;
	}
}









?>