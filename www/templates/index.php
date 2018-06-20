<?php

// echo '<pre>';
// ini_set("display_errors", 1);

/**
 * Example Application
 *
 * @package Example-application
 */

// echo '<pre>';
// print_r($_REQUEST);


require 'libs/Smarty.class.php';

include("mysql.php");
$smarty = new Smarty;
// AlLOWS ARRAYS IN CONFIG FILE
$smarty->config_overwrite=false; 
$smarty->debugging = true;
$smarty->caching = false;
//$smarty->cache_lifetime = 120;

// echo '<pre>';
// print_r($_SERVER);
// exit();

// -- GOLABLE SETTINGS
//	$smarty->assign("alerts", array("foo" => "bar", "bar" => "foo"));

if ( isset ( $_SERVER['LOGON_USER'] ) )
	$smarty->assign("userlogedin", str_replace("SIMON-EVERETT\\", "", $_SERVER['LOGON_USER'] ));
if ( isset ( $_SERVER['REMOTE_HOST'] ) )
	$smarty->assign("userhost", $_SERVER['REMOTE_HOST'] );
else
	$smarty->assign("userhost", "http://82.5.112.74" );
// poplated from incert mysql.php
	$smarty->assign("current_user", $fetched_user_array );
	$smarty->assign("REQUEST_URI", $_SERVER ['REQUEST_URI'] );
	

// Passing though managed settings to Template engin.

//	$smarty->assign('ROOMS', array( 'E1' => 'E1', 'E2' => 'E2', 'E3' => 'E3' ));

	$smarty->assign('ROOMS', $ROOMS);
	$smarty->assign("YEARS", array( '7' => 'Year 7', '8' => 'Year 8', '9' => 'Year 9', '10' => 'Year 10', '11' => 'Year 11', '12' => 'Year 12' ) );
	$smarty->assign("BehaviourType", array( '1' => 'Rude to staff', '2' => 'Shouting out', '3' => 'Refusing to follow instructions', '4' => 'Refusing to sit where asked', '5' => 'Refusing to empty mouth', '6' => 'Late to lesson' , '7' => 'Disrupting others' ) );



	$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;

	if (preg_match('/alert/',$_SERVER ['REQUEST_URI']))
	{

		$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;
//print_r($input2);
		if ( isset ($input2['2']) )
		{
			
		if ( isset ($_REQUEST['mode']) != TRUE)
			$mode = $input2['2'];
		else
			$mode = $_REQUEST['mode'];
					
switch ( $mode ) {
    case 's':
//-- SINGLE STUDENT
			$sqlSelect = ("SELECT alert.alert_id
			, alert.reason
		    , alert.alert_type_id
		    , alert.behaviour_type_id
		    , alert.alert_status
		    , alert.room
		    , alert.timestamp
		    , students.username
		    , students.name
		    , students.year
   		    , users.fullname
   		    , users.user_name
		From alert, students, users
		  where alert.student_id = students.student_id 
	      and alert.user_id = users.id
		  and students.username = :student_username ");

		$sth = $conn->prepare($sqlSelect);
		$sth->execute( array( ':student_username' => $input2['3'] ) );
		  
        break;
    case 't':
//-- USER EVENTS BETWEEN A TIME CODE

				$sqlSelect = ("SELECT alert.alert_id
				, alert.reason
			    , alert.alert_type_id
			    , alert.behaviour_type_id
			    , alert.alert_status
			    , alert.room
			    , alert.timestamp
			    , students.username
			    , students.name
			    , students.year
			    , users.fullname
			From alert, students, users
			  where alert.student_id = students.student_id 
		      and alert.user_id = users.id		      
			  and `timestamp` BETWEEN :from AND :untill
		 ");

			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':from' => strtotime ( $_REQUEST['from'] ) , ':untill' => strtotime ( $_REQUEST['untill'] ) ) );

			echo strtotime ( $_REQUEST['untill'] ) . '  -- ' .  strtotime ( $_REQUEST['from'] ) ; 
			
			exit();
			
			foreach ($sth->fetchAll() as $row) 
			{
				$fetched_single_user_report[] = $row;	
			}

	break;
    case 'u':
//-- all reports that happen dureinga single teacher..
			$sqlSelect = ("SELECT alert.alert_id
			, alert.reason
		    , alert.alert_type_id
		    , alert.behaviour_type_id
		    , alert.alert_status
		    , alert.room
		    , alert.timestamp
		    , students.username
		    , students.name
		    , students.year
		    , users.fullname
		From alert, students, users
		  where alert.student_id = students.student_id 
	      and alert.user_id = users.id
		  and users.user_name = :teacher_username ");

			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':teacher_username' => $input2['3'] ) );

        break;
    default:
//		echo 'Missing mode, contex shoild be /app/ mode u/t/s /query';

} 

			foreach ($sth->fetchAll() as $row) 
			{
				$fetched_single_user_report[] = $row;		
			}

			$smarty->assign("title", "Single Alert");
			if (isset ($fetched_single_user_report))
				$smarty->assign("student_results", $fetched_single_user_report);	
			if ( !empty( $input2['3']  ))
				$smarty->assign("student", $input2['3']);
		}
					
		$Load = "alert.tpl";
		$smarty->assign("title", "Alerts");
	}
// ALLOW ROOMS TO BE ADDED/REMOVED
	elseif ( preg_match('/room/',$_SERVER ['REQUEST_URI']))
	{	
		$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;
		if ( $input2['2'] == "remove" )
			$smarty->assign("remove", $input2['2']);
		elseif ($input2['2'] == "add")
			$smarty->assign("add", $input2['2']);

		$smarty->assign("type", "Room");
		$smarty->assign("title", "Admin");
		$Load = "admin.tpl";
	}
// ALLOW Years TO BE ADDED/REMOVED
	elseif ( preg_match('/year/',$_SERVER ['REQUEST_URI']))
	{	
		$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;
		if ( $input2['2'] == "remove" )
			$smarty->assign("remove", $input2['2']);
		elseif ($input2['2'] == "add")
			$smarty->assign("add", $input2['2']);

		$smarty->assign("type", "Year");
		$smarty->assign("title", "Admin");
		$Load = "admin.tpl";
	}
// ALLOW GROUPS TO BE ADDED/REMOVED
	elseif ( preg_match('/group/',$_SERVER ['REQUEST_URI']))
	{	
		$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;
		if ( $input2['2'] == "remove" )
			$smarty->assign("remove", $input2['2']);
		elseif ($input2['2'] == "add")
			$smarty->assign("add", $input2['2']);

		$smarty->assign("type", "Group");
		$smarty->assign("title", "Admin");
		$Load = "admin.tpl";
	}	
	else {
	// START OF SWITCH
		$url_request = str_replace ( "on-call/" , '' , $_SERVER ['REQUEST_URI'] );
	//	$url_request = '/';
	
	//-- If acknloged or closed	
		if (preg_match('/acknowladge/',$_SERVER ['REQUEST_URI']))
		{
			$url_request = "/";
			$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;
		


// CALL SELECT ALLERT DEATILS
//			$sqlSelect = ("	SELECT * , students.Name, behaviour_type.behaviour_type_descriptions FROM alert, students, behaviour_type WHERE alert.student_id = students.student_id and `alert_id` = :alert_id and alert.behaviour_type_id = behaviour_type.behaviour_type_id ; ");
			$sqlSelect = ("	SELECT * , students.Name, behaviour_type.behaviour_type_descriptions FROM alert, students, behaviour_type WHERE alert.student_id = students.student_id and `alert_id` = :alert_id ; ");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':alert_id' => $input2 ['2'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$single_alert_call[] = $row;
		//	echo 'Results EXISTS';
			}
		
// MARK AS acknowledged in the DB	

// echo '<pre>';
// print_r($single_alert_call);
// exit();


	
// Infomaction

			if( $single_alert_call['0']['alert_type_id'] == 2 AND isset( $_REQUEST['responce']) )
			{
				$sqlSelect = ("UPDATE `alert` SET `alert_status` = '1', `alert_response` = :alert_response WHERE `alert`.`alert_id` = :alert_id ;");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':alert_id' => $input2 ['2'], ':alert_response' => $_REQUEST['responce'] ) );
				$smarty->assign("fully_acknowladged", $single_alert_call);
			}
// Behvour
			elseif ( $single_alert_call['0']['alert_type_id'] == 1 )
			{
				$sqlSelect = ("UPDATE `alert` SET `alert_status` = '2' WHERE `alert`.`alert_id` = :alert_id ;");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':alert_id' => $input2 ['2'] ) );
				$smarty->assign("fully_acknowladged", $single_alert_call);
			}
			$smarty->assign("acknowladged", $single_alert_call);
	}

	if (preg_match('/close/',$_SERVER ['REQUEST_URI']))
	{
		$url_request = "/";
		$input2 = explode( '/', $_SERVER ['REQUEST_URI'] ) ;

		$sqlSelect = ("	SELECT * , students.Name, behaviour_type.behaviour_type_descriptions FROM alert, students, behaviour_type WHERE alert.student_id = students.student_id and `alert_id` = :alert_id  ; ");
		$sth = $conn->prepare($sqlSelect);
		$sth->execute( array( ':alert_id' => $input2 ['2'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$single_alert_call[] = $row;
			}
// Behavour

		if( $single_alert_call['0']['alert_type_id'] == 1 AND isset( $_REQUEST['responce']) )
		{
			$sqlSelect = ("UPDATE `alert` SET `alert_status` = '1', `alert_response` = :alert_response WHERE `alert`.`alert_id` = :alert_id ;");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':alert_id' => $input2 ['2'], ':alert_response' => $_REQUEST['responce'] ) );
			$smarty->assign("fully_closed", $single_alert_call);
		}
	$smarty->assign("close", $single_alert_call);
	$smarty->assign("closed", $input2);
	}
	
			switch ( $url_request ) {
				case "/reports/":
					$smarty->assign("title", "Reports");
					$Load = "reports.tpl";
//					echo 'reports....';
				break;
				case "/alerts/":
// NOT USED AS THE IF AT THE TOP CATCHES IT.. THEN ELESE OUT
//				echo 'alerts....';

				break;	
				
				case "/admin/":
					$smarty->assign("title", "Admin");
					$Load = "admin.tpl";
//					echo 'admin....';
				break;	

				case "/test/":
					$smarty->assign("title", "Test");
					$Load = "text.tpl";
//					echo 'test....';
				break;
				
				case "/JSON/":					
/*
					$sqlSelect = ("SELECT alert.alert_id
					, alert.reason
				    , alert.alert_type_id
				    , alert.behaviour_type_id
				    , alert.alert_status
				    , alert.room
				    , students.username
				    , students.name
  				    , students.year
  				    , students.username
				    , users.fullname
                    , users.user_name
				From alert, students, users
				  where alert.student_id = students.student_id 
                  and alert.user_id = users.id
				  and alert.alert_status != 1 ");
*/

					$sqlSelect = ("
SELECT *
FROM alert
LEFT OUTER JOIN students ON alert.student_id = students.student_id
LEFT OUTER JOIN alert_played ON alert.alert_id = alert_played.alert_id
LEFT OUTER JOIN users ON alert.user_id = users.id  
WHERE alert.alert_status != 1
					");
					
					$sth = $conn->prepare($sqlSelect);
		
					$sth->execute( array( ':LoggedInUserID' => $fetched_user_array[0][id] ) );
					
					foreach ($sth->fetchAll() as $row) 
					{
						$fetched_dashboard_array[] = $row;
						
						
//							echo 'update' . ;
//							exit ();

//						echo 'Results EXISTS';
					}


					if ( isset($fetched_dashboard_array) )
					{
						foreach ($fetched_dashboard_array as $row) 
						{
//							echo '<pre>';
//							print_r($row);
//exit();
							if ( $row['time'] == NULL )
							{
//									echo ( $row['time'] . " Updateing :" . $row['0'] . "\n\n" );
									
									$sql = "INSERT INTO `oncall`.`alert_played` ( `alert_id`, `users_id`) VALUES ( :alert_id, :user_id);";
									$sth = $conn->prepare($sql);
									$sth->execute( array( ':alert_id' => $row['0'], ':user_id' => $fetched_user_array[0][id] ) );
									
//									$sth = $conn->prepare( "UPDATE `alert` SET `alert_status` = '3' WHERE `alert`.`alert_id` = :alert_id; " );
//									$sth->execute( array( ':alert_id' => $row['alert_id'] ) );
							}
						}
						echo json_encode($fetched_dashboard_array);
					}
					else
					{
						
						echo 'No posts';
					}
exit();
				break;

				case "/":
					$smarty->assign("title", "Dashboard");
					
					
					$sqlSelect = ("SELECT alert.alert_id
					, alert.reason
				    , alert.alert_type_id
				    , alert.behaviour_type_id
				    , alert.alert_status
				    , alert.room
				    , students.username
				    , students.student_first_name
				    , students.student_second_name
  				    , students.year
				    , users.fullname
				From alert, students, users
				  where alert.student_id = students.student_id 
				  and alert.user_id = users.id
				  and alert.alert_status != 3 ");
					$sth = $conn->prepare($sqlSelect);
				//	$sth->execute( array( ':username' => $user ) );
					$sth->execute( );
					
					foreach ($sth->fetchAll() as $row) 
					{
						$fetched_dashboard_array[] = $row;
					//	echo 'Results EXISTS';
					}

// 			THIS IS NOW DONE IN JSON!!					
//					$smarty->assign("active_alerts", $fetched_dashboard_array);					
					
					$Load = "dashboard.tpl";
//					echo 'Dashboard....';
				break;

				
				case "/settings/":
					$smarty->assign("title", "Settings");
//					echo 'settings....';
				break;
				
				case "/download_report/":
			// EXPORT CSV

					function generateCsv($data, $delimiter = ',', $enclosure = '"') {
						$contents= NULL;
					       $handle = fopen('php://temp', 'r+');
					       foreach ($data as $line) {
					               fputcsv($handle, $line, $delimiter, $enclosure);
					       }
					       rewind($handle);
					       while (!feof($handle)) {
					               $contents .= fread($handle, 8192);
					       }
					       fclose($handle);
					       return $contents;
					}			
					
					$smarty->debugging = false;
					$smarty->caching = false;

					header("Content-type: text/csv");
					header("Content-Disposition: attachment; filename=file.csv");
					header("Pragma: no-cache");
					header("Expires: 0");

					
					
					$sqlSelect = ("
					
					SELECT alert.alert_id
					, alert.alert_type_id
				    , alert.reason
				    , alert.behaviour_type_id
				    , alert.alert_status
				    , alert.room
				    , students.username
				    , students.name
  				    , students.year
				    , users.fullname
                    , behaviour_type.behaviour_type_descriptions
				From alert, 
				students, 
				users,
                behaviour_type
				where alert.student_id = students.student_id 
				and alert.user_id = users.id
                and alert.behaviour_type_id = behaviour_type.behaviour_type_id
				
				");
					$sth = $conn->prepare($sqlSelect);
				//	$sth->execute( array( ':username' => $user ) );
					$sth->execute( );
					
					$fetched_dashboard_array[] = $array = array( "alert.alert_id", "alert.alert_type_id", "alert.reason" , "alert.behaviour_type_id" , "alert.alert_status" , "alert.room" , "students.username" , "students.name" , "students.year" , "users.fullname" , "behaviour_type_descriptions");

//-- PDO::FETCH_ASSOC remove all of the number item arrays.					
					foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) 
					{
						$fetched_dashboard_array[] = $row;
					//	echo 'Results EXISTS';
					}

					echo generateCsv($fetched_dashboard_array) ;
				
					exit();
				break;
				
				case "/new/infomaction/confirm/":
				$smarty->assign("mode", "infomaction");				
				
			$sqlSelect = ("	
			SELECT *
			FROM `students`
			WHERE `Name` = :name
			AND `year` =:year ; ");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':name' => $_REQUEST['name'], ':year' => $_REQUEST['year'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$looking_for_student_user[] = $row;
			}
//				echo '<pre>';

		
		if ( count( $looking_for_student_user ) == 1 )
		{
// Found only one student!
			$smarty->assign("found", true);	
			$smarty->assign("data", $_REQUEST);
			$smarty->assign("result",$looking_for_student_user);
		}
		else 
		{
// Didnt recived price name.. checking to see if we can fix this..
	
			$smarty->assign("found", FALSE);	
			$smarty->assign("data", $_REQUEST);
			

			$sqlSelect = ("	
				SELECT *
				FROM `students`
				WHERE `Name` LIKE :name
				AND `year` =:year 
				LIMIT 0 , 30
			; ");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':name' => '%'.$_REQUEST['name'].'%', ':year' => $_REQUEST['year'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$looking_for_posable_students[] = $row;

			}

			if (count ($looking_for_posable_students) >= 1)
			{
//Wicked we found at least , our work is done.. stop 
				echo count($looking_for_posable_students);
				$smarty->assign("result",$looking_for_posable_students);	
			}
			else
			{
//Still didnt find anything show the whole year group!

				$sqlSelect = ("	SELECT * FROM `students` WHERE `year` =:year");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':year' => $_REQUEST['year'] ) );
			
				foreach ($sth->fetchAll() as $row) 
				{
					$looking_for_posable_students[] = $row;
		
				}
				$smarty->assign("result",$looking_for_posable_students);	
			}
	
		}
// 						$smarty->assign("found", true);


					$Load = "oncall.tpl";
				break;

				case "/logs/":
//					print_r(file_get_contents( "/var/www/html/82.5.112.74/log/staff.txt" ));
//					exit();
					$smarty->assign("staff_log", file_get_contents( "/var/www/html/82.5.112.74/log/staff.txt" ) ) ;
//					$smarty->assign("mode", "assistance");
					$Load = "logs.tpl";
				break;				
				
								
				case "/new/assistance/confirm/":
		
					
//				case "/new/infomaction/confirm/":
				$smarty->assign("mode", "assistance");				
				
			$sqlSelect = ("	
			SELECT *
			FROM `students`
			WHERE `Name` = :name
			AND `year` =:year ; ");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':name' => $_REQUEST['name'], ':year' => $_REQUEST['year'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$looking_for_student_user[] = $row;
			}
//				echo '<pre>';

		
		if ( count( $looking_for_student_user ) == 1 )
		{
// Found only one student!
			$smarty->assign("found", true);	
			$smarty->assign("data", $_REQUEST);
			$smarty->assign("result",$looking_for_student_user);
		}
		else 
		{
// Didnt recived price name.. checking to see if we can fix this..
	
			$smarty->assign("found", FALSE);	
			$smarty->assign("data", $_REQUEST);
			

			$sqlSelect = ("	
				SELECT *
				FROM `students`
				WHERE `Name` LIKE :name
				AND `year` =:year 
				LIMIT 0 , 30
			; ");
			$sth = $conn->prepare($sqlSelect);
			$sth->execute( array( ':name' => '%'.$_REQUEST['name'].'%', ':year' => $_REQUEST['year'] ) );
		
			foreach ($sth->fetchAll() as $row) 
			{
				$looking_for_posable_students[] = $row;

			}

			if (count ($looking_for_posable_students) >= 1)
			{
//Wicked we found at least , our work is done.. stop 
				echo count($looking_for_posable_students);
				$smarty->assign("result",$looking_for_posable_students);	
			}
			else
			{
//Still didnt find anything show the whole year group!

				$sqlSelect = ("	SELECT * FROM `students` WHERE `year` =:year");
				$sth = $conn->prepare($sqlSelect);
				$sth->execute( array( ':year' => $_REQUEST['year'] ) );
			
				foreach ($sth->fetchAll() as $row) 
				{
					$looking_for_posable_students[] = $row;
		
				}
				$smarty->assign("result",$looking_for_posable_students);	
			}
	
		}
// 						$smarty->assign("found", true);


					$Load = "oncall.tpl";
					
					
//					$smarty->assign("data", $_REQUEST);
//					$smarty->assign("mode", "assistance");
//					$Load = "oncall.tpl";
				break;				


				case "/new/assistance/":
					$smarty->assign("data", $_REQUEST);
					$smarty->assign("mode", "assistance");
					$Load = "oncall.tpl";
				break;
				
				case "/new/infomaction/":
					$smarty->assign("data", $_REQUEST);
					$smarty->assign("mode", "infomaction");
					$Load = "oncall.tpl";
				break;
				
				case "/new/pending/":
				// -- NEED TO INVERT INTO DB!

				 
				if ( isset ( $_REQUEST['mode'] ) )
				{
						if ( $_REQUEST['mode'] == 'infomaction' )
						{
							$sqlSelect = ("SELECT * FROM `students` WHERE `Name` = :name AND `year` = :year ");
							$sth = $conn->prepare($sqlSelect);
							$sth->execute( array( ':name' => $_REQUEST['name'], ':year' => $_REQUEST['year'] ) );
							
							foreach ($sth->fetchAll() as $row) 
							{
								$fetched_student_array[] = $row;
							}
							
							$sqlSelect = ("INSERT INTO `alert` (`alert_id`, `user_id`, `student_id`, `reason`, `room`, `alert_type_id`, `behaviour_type_id`, `timestamp`, `alert_response` ) VALUES (NULL, :logedin_user_ID, :student_ID, :reason, :room, '2', '0', CURRENT_TIMESTAMP, ' ');");
							$sth = $conn->prepare($sqlSelect);			
							$sth->execute( array( ':logedin_user_ID' =>  $fetched_user_array[0]['id'], ':student_ID' => $fetched_student_array[0]['student_id'] , ':reason' => $_REQUEST['comments'] , ':room' => $_REQUEST['room'] ) );
				
				//-- load current alert
							$sqlSelect = ("SELECT * FROM `alert` WHERE `user_id` = :current_user ORDER BY `alert`.`alert_id` DESC LIMIT 1 ");
							$sth = $conn->prepare($sqlSelect);
							$sth->execute( array( ':current_user' => $fetched_user_array[0]['id'] ) );
							
							foreach ($sth->fetchAll() as $row) 
							{
								$fetched_dashboard_array[] = $row;
							//	echo 'Results EXISTS';
							}

							$smarty->assign("mode", "refresh");
							$smarty->assign("alert_id", $fetched_dashboard_array[0]['alert_id']);
							$smarty->assign("data", $_REQUEST);
						}
						
						if ( $_REQUEST['mode'] == 'assistance' )
						{
							$sqlSelect = ("SELECT * FROM `students` WHERE `Name` = :name AND `year` = :year ");
							$sth = $conn->prepare($sqlSelect);
							$sth->execute( array( ':name' => $_REQUEST['name'], ':year' => $_REQUEST['year'] ) );
							
							foreach ($sth->fetchAll() as $row) 
							{
								$fetched_student_array[] = $row;
							}
							
							$sqlSelect = ("INSERT INTO `alert` (`alert_id`, `user_id`, `student_id`, `reason`, `room`, `alert_type_id`, `behaviour_type_id`, `alert_status`, `timestamp`, `alert_response`) VALUES (NULL, :logedin_user_ID, :student_ID, :reason, :room, '1', :behaviour_type, '4', CURRENT_TIMESTAMP, '');");
							$sth = $conn->prepare($sqlSelect);			

							$sth->execute(array( ':logedin_user_ID' =>  $fetched_user_array[0]['id'] , ':student_ID' => $fetched_student_array[0]['student_id'] , ':reason' => $_REQUEST['comments'] , ':room' => $_REQUEST['room'] , ':behaviour_type' => $_REQUEST['reason'] ));

							echo  '<pre>logedin_user_ID = ' . $fetched_user_array[0]['id'] . "\nStudent_ID = " . $fetched_student_array[0]['student_id'] . "\n  reason  = " . $_REQUEST['comments'] . "\nroom = " .  $_REQUEST['room'] . ' behaviour_type  ==' . $_REQUEST['reason'] . "\n";

exit();

	
				//-- load current alert
							$sqlSelect = ("SELECT * FROM `alert` WHERE `user_id` = :current_user ORDER BY `alert`.`alert_id` DESC LIMIT 1 ");
							$sth = $conn->prepare($sqlSelect);
							$sth->execute( array( ':current_user' => $fetched_user_array[0]['id'] ) );
							
							foreach ($sth->fetchAll() as $row) 
							{
								$fetched_dashboard_array[] = $row;
							//	echo 'Results EXISTS';
							}

							$smarty->assign("mode", "refresh");
							$smarty->assign("alert_id", $fetched_dashboard_array[0]['alert_id']);
							$smarty->assign("data", $_REQUEST);
							
						}
						elseif ( $_REQUEST['mode'] == 'refresh' ) 
						{
				//-- load current alert from refresh
							$sqlSelect = ("SELECT * FROM `alert` WHERE `alert_id` = :alert_id ORDER BY `alert_id` DESC LIMIT 2 ");
							$sth = $conn->prepare($sqlSelect);
							$sth->execute( array( ':alert_id' => $_REQUEST['alert_id'] ) );
							
							foreach ($sth->fetchAll() as $row) 
							{
								$fetched_dashboard_array[] = $row;
							}
							
							$smarty->assign("alert_data", $fetched_dashboard_array);
							$smarty->assign("alert_id", $fetched_dashboard_array[0]['alert_id']);
							$smarty->assign("mode", "refresh");
				
						}	
					}

				$Load = "pending.tpl";
					
				break;
				
				case "/new/":
					$smarty->assign("mode", "infomaction");
					$Load = "oncall.tpl";
				break;
								
				case "/new/Assistance/":
					$smarty->assign("mode", "assistance");
					$Load = "oncall.tpl";
				break;
				
				
				case "/new/Infomaction/":
					$smarty->assign("mode", "infomaction");
					$Load = "oncall.tpl";
				break;
				
				
				case "/new/about/":
				$smarty->assign("mode", "about");
					$Load = "oncall.tpl";
				break;
				
				default:
			//        code to be executed if n is different from all labels;
				print_r($_SERVER['REQUEST_URI']);
				echo '<hr><pre>';
				print_r($_SERVER);
				echo '<hr>';
				print_r($_REQUEST);
				exit();
			} 
// End OF SWITCH
}

//print_r ( $_SERVER['DOCUMENT_ROOT]'] );

// Render Page with tbis template IF requried.. 
if (isset( $Load) )
{
//		if (file_exists ( "templates\\" . $Load ))
//		if ( file_exists ( $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $Load ) )

if ( file_exists ( $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'templates' .  '/' . $Load ) )
			$smarty->display($Load);
		else{
			echo 'Internal Error, Seek support. <br>Template file missing.' . $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'templates' .  $_SERVER ['REQUEST_URI']	 . $Load;
			echo '<pre>';
//			print_r($_SERVER);
			exit();
		}
			
}else
{
	$smarty->display('404.tpl');
}




