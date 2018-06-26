<?php

echo "STAFF IMPORT SCRIPT \n===================\nCSV \t\t[" . $argv['1'] . "]\n";
echo "Run Time \t[".date("Y/m/d") . "]\n";
echo "Importing file\t [" . $argv['1'] . "]\n";
echo "Runing AS \t[" . get_current_user() . "]\n\n";

if ( isset( $argv['2'] ) )
{
	echo 'Required second argment, Thie csv should contain staff logins..??';
	exit();
}
  
if (file_exists ( $argv['1'] ) )
{
//-- CSV file found, lets get started

	echo "CSV exists... \n";
	$csv = array_map('str_getcsv', file( $argv['1'] ));

	echo "Loaded existing users from DB.. \n";
	include_once "mysql.php";

	$sqlSelect = ("SELECT * FROM `users` ");

	$sth = $conn->prepare($sqlSelect);
	$sth->execute(  );		  

		  
	foreach ($sth->fetchAll() as $row) 
	{
		$fetched_all_user[] = $row;
	}

	$count=0;
	$valid=FALSE;
	
	echo "inspecting csv..\n";
	foreach ($csv as $csv_row)
	{
		
//		print_r ( $csv_row );
// 		LOGIN! = [Conference Room]  [Conference Room] 
//		echo 'LOGIN! = [' . $csv_row['14'] . ']  NAME = [' . $csv_row['25'] . "]\n";
		
		if( $count == 0 )
		{
// dose the CSV have the corect data we expect to see
			if( $csv_row['14'] == "CN" ||  $csv_row['25'] == "DisplayName" )
			{
				$valid=TRUE;
				echo "CSV vaild..\n\n";
			}
			if( $valid == FALSE )
			{
				echo "Error malformed file input..\n[" . $csv_row['14'] . ']  [' . $csv_row['25'] . ']  ' ;
				exit();
			}
		}
		elseif ( $count >= 1) 
		{
			$found_user_in_DB=FALSE;			
			foreach ($fetched_all_user as $db_row)
			{
				if ( $db_row['user_name'] ===  $csv_row['14'] )
				{
//-- DOSE THIS CSV USERNAME EXSIT IN THE DB?
// <--------------------------------------------------------------------- SOMETHINGS WRONG!!! -------------------------------------------------->>>
//                                                                         WITH THIS IF STAMENT!!
					if ( $csv_row['25'] === $db_row["fullname"] )
					{
// echo "COMAPREING (" . $csv_row['25'] .") (". $db_row["fullname"] . ")\n";
						
// -- THATS BOARING NOTHING TO DO!!
						echo "[ " . $csv_row['14'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") \n";
						$found_user_in_DB=TRUE;
//						echo "DEBUG  CSV = [" . $csv_row['25'] . "] DB = [" . $db_row['fullname'] . "]";
					}
					else					
					{
//-- THAST EXISTING DOSE ARE THE NAME DIFFRENT?
//						echo "CSV FEILD AND DB FEILD ARE DIFFRNET CSV = [" . $csv_row['25'] . "] DB = [" . $db_row['fullname'] . "] AND UPDATEING DB to --> [" . $csv_row['23'] . "]";
					
						$sqlSelect = ("UPDATE `users` SET `fullname` = :new_fullname WHERE `users`.`id` = :user_id ;");
						$sth = $conn->prepare($sqlSelect);
						$sth->execute( array( ':new_fullname' => $csv_row['25'] , ':user_id' => $db_row['id'] ) );

						echo "[ " . $csv_row['14'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") updated\n";
						$found_user_in_DB=true;												
					}

				}	

			}

			if ($found_user_in_DB == FALSE)
			{
// -- THIS USER WITCH WAS PROVIED BY THE CSV DOSENT EXISTING IN THE DB
// -- ADD IT!
				$sqlSelect = ("INSERT INTO `oncall`.`users` (`id`, `fullname`, `user_name`, `dashboad`, `created_on`) VALUES (NULL, :new_fullname, :login, '0', CURRENT_TIMESTAMP);");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':new_fullname' => $csv_row['25'] , ':login' => $csv_row['14']) );
				echo "[ " . $csv_row['14'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") Created\n";
			}
		}

		$count=$count+1;
	}

// Print_r($csv_sorted);

	
}
else
{
	echo 'File not found.';
	exit();
}

echo "Finshed as expected\n";
?>