<?php

echo "STUDENT IMPORT SCRIPT \n===================\nCSV \t\t[" . $argv['1'] . "]\n";
echo "Run Time \t[".date("Y/m/d") . "]\n";
echo "Importing into year group \t [" . $argv['2']  . "]\n";
echo "Runing AS \t[" . get_current_user() . "]\n\n";

//should we set the whole year group to 0
// UPDATE `students` SET `year` = '0' WHERE `students`.`year` = 7; 
  
if ( $argv['1'] ==  "clear_student_year_groups" )
{
	include_once "mysql.php";
	echo "Clearing students year groups\n";
	$sth = $conn->prepare( "UPDATE students SET year = :year " );
	echo 'Completed';
	$sth->execute( array( ':year' => 0 ) );
	exit();
}

if (file_exists ( $argv['1'] ) )
{
//-- CSV file found, lets get started

	echo "CSV exists... \n";
	$csv = array_map('str_getcsv', file( $argv['1'] ));

	echo "Loaded existing users from DB.. \n";
	include_once "mysql.php";

//	$sqlSelect = ("SELECT * FROM `students` WHERE `year` =:year ");
		
	$sqlSelect = ("SELECT * FROM `students` ");

	$sth = $conn->prepare($sqlSelect);
//	$sth->execute( array( ':year' => $argv['2'] ) );
	$sth->execute( );
		  
	foreach ($sth->fetchAll() as $row) 
	{
		$fetched_all_user[] = $row;
	}

	$count=0;
	$valid=FALSE;
	
	echo "inspecting csv..\n";
//--	Step though the CSV
	foreach ($csv as $csv_row)
	{
		
//		print_r ( $csv_row );
// 		LOGIN! = [Conference Room]  [Conference Room] 
//		echo 'LOGIN! = [' . $csv_row['7'] . ']  NAME = [' . $csv_row['0'] . "]\n";
		
		if( $count == 0 )
		{
// dose the CSV have the corect data we expect to see
			if( $csv_row['7'] == "SamAccountName" ||  $csv_row['0'] == "DisplayName" )
			{
				$valid=TRUE;
				echo "CSV vaild..\n\n";
			}
			if( $valid == FALSE )
			{
				echo "Error malformed file input..\n[" . $csv_row['7'] . ']  [' . $csv_row['0'] . ']  ' ;
				exit();
			}
		}
		elseif ( $count >= 1) 
		{
			$found_user_in_DB=FALSE;			
			foreach ($fetched_all_user as $db_row)
			{
				if ( $db_row['username'] ===  $csv_row['7'] )
				{
//-- DOSE THIS CSV USERNAME EXSIT IN THE DB?
// <--------------------------------------------------------------------- SOMETHINGS WRONG!!! -------------------------------------------------->>>
//                                                                         WITH THIS IF STAMENT!!
					if ( $csv_row['0'] === $db_row["Name"] )
					{
// echo "COMAPREING (" . $csv_row['0'] .") (". $db_row["fullname"] . ")\n";
						
// -- THATS BOARING NOTHING TO DO!!
						echo "[ " . $csv_row['7'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") \n";
						$found_user_in_DB=TRUE;
//						echo "DEBUG  CSV = [" . $csv_row['0'] . "] DB = [" . $db_row['fullname'] . "]";

						if ( $db_row["year"] != $argv['2'] )
						{
							$sth = $conn->prepare( "UPDATE `students` SET `year` =  :year WHERE `students`.`username` = :username ; " );
							$sth->execute( array( ':year' => $argv['2'] , ':username' => $db_row['username']  ) );
	
//							echo "UPDATE `students` SET `year` =  :year WHERE `students`.`username` = :username ; ";
//							exit();
						}
					}
					else					
					{
//-- THAST EXISTING DOSE ARE THE NAME DIFFRENT?
//						echo "CSV FEILD AND DB FEILD ARE DIFFRNET CSV = [" . $csv_row['0'] . "] DB = [" . $db_row['fullname'] . "] AND UPDATEING DB to --> [" . $csv_row['23'] . "]";
	
//echo "I NEED TO UPDATE THIS ELEMENT into  " . $argv['2']  . "\n";				
						$sqlSelect = (" UPDATE `students` SET `Name`     = :new_fullname WHERE `students`.`student_id` =:student_id; AND `students`.`student_id` =:year ");
						$sth = $conn->prepare($sqlSelect);
						$sth->execute( array( ':new_fullname' => $csv_row['0'] , ':student_id' => $db_row['student_id'], ':year' =>  $argv['2']) );

						echo "[ " . $csv_row['7'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") updated\n";
						$found_user_in_DB=true;												
					}

				}	

			}

		
			if ($found_user_in_DB == FALSE && preg_match($regex, $csv_row['7']))
			{
// -- THIS USER WITCH WAS PROVIED BY THE CSV DOSENT EXISTING IN THE DB
// -- ADD IT!
// echo "I NEED TO IMPORT THIS ELEMENT into  " . $argv['2']  . "\n";				
				$sqlSelect = ("INSERT INTO `oncall`.`students` ( `student_id` , `Name` , `username` , `year` )VALUES ( NULL , :new_fullname, :login, :year );");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':new_fullname' => $csv_row['0'] , ':login' => $csv_row['7'], ':year' => $argv['2']) );

				echo "[ " . $csv_row['7'] ."] \t\t\t (" . $count . '/' . ( count($csv) - 1 ) .  ") Created\n";
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