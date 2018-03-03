<?php

	class User {
		public static function putUserData($user_key, $user_data) {
			$pdo = Db::getConnect();

			$sqlQuery = $pdo->prepare(
				"INSERT or REPLACE INTO `tbl_usernumber` (`userkey`, `userdata`)"
					. " VALUES (:userkey, :userdata)"
			); 

			$bRet = $sqlQuery->execute(
				array(
				':userkey' => $user_key
				, ':userdata' => $user_data
			));

			if ($bRet == FALSE)
			{ // ERROR
				die("ERROR code: " 
						. $sqlQuery->errorCode());
			}

			// done
			unset($sqlQuery);
			unset($pdo);
    	}

		// public static function addNumber($userkey, $user_number) {
		// 	$pdo = Db::getConnect();

		// 	$sqlQuery = $pdo->prepare(
		// 		"INSERT INTO `tbl_usernumber` (`userkey`, `user_number`)"
		// 			. " VALUES (:userkey, :user_number)"
		// 	); 

		// 	$bRet = $sqlQuery->execute(
		// 		array(
		// 		':userkey' => $userkey
		// 		, ':user_number' => $user_number
		// 	));

		// 	if ($bRet == FALSE)
		// 	{ // ERROR
		// 		die("ERROR code: " 
		// 				. $sqlQuery->errorCode());
		// 	}

		// 	// done
		// 	unset($sqlQuery);
		// 	unset($pdo);
  //   	}

		// public static function getHistoryNumbers($userkey) {
		// 	$pdo = Db::getConnect();

		// 	$sqlQuery = $pdo->prepare(
		// 		"SELECT * FROM `tbl_usernumber`"
		// 		. " WHERE `userkey` = :userkey"
		// 	); 

		// 	$bRet = $sqlQuery->execute(
		// 		array(':userkey' => $userkey));

		// 	if ($bRet == FALSE)
		// 	{ // ERROR
		// 		die("ERROR code: " 
		// 				. $sqlQuery->errorCode());
		// 	}

		// 	$json = json_encode($sqlQuery->fetchAll(PDO::FETCH_ASSOC));
		// 	///$result = $sqlQuery->fetchAll();

		// 	// $members = array();

		// 	// foreach( $result as $row ) 
		// 	// {
		// 	// 	array_push($members, $row);
		// 	// }

		// 	// done
		// 	unset($sqlQuery);
		// 	unset($pdo);

		// 	return $json; //$members;
  //   	}

	}
?>