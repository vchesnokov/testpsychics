<?php
	//ini_set('display_errors',1); // DEBUG!
	//error_reporting(E_ALL); // DEBUG!

	spl_autoload_register(function ($class_name) {
	    include $class_name . '.php';
	});

	//$out = array('errortext' => null, 'data' => null);
	$out = array('errortext' => null);

	try {
		// take POST params
		$userkey = "";
		$userdata = "";

		if (isset($_POST["userkey"]))
			$userkey = $_POST["userkey"];

		if (isset($_POST["userdata"]))
			$userdata = $_POST["userdata"];

		User::putUserData($userkey, $userdata);
		die();

		// DEBUG!
		//$out = array('errortext' => null, 'user_number' => $user_number, 'user_key' => $user_key, 'data' => $user_number); // DEBUG

		// // add new user number
		// User::addNumber($user_key, $user_number);

		// // get history numbers
		// $out['data'] = User::getHistoryNumbers($user_key);

		// echo json_encode($out);
		//die();
	} catch (Exception $e) {
		$out = array('errortext' => $e->getMessage()); //, 'data' => null);
		echo json_encode($out);
		die();
	}
?>