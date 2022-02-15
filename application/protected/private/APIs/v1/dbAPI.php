<?php
require_once dirname(__FILE__).'../../controllers/operations/Operations.php';

function isParameterAvailable($params)
{
	$available = true;
	$missing_params = "";

	foreach ($params as $param) {
		if (!isset($_POST[$param]) || strlen($_POST[$param])<=0) {
			$available = false;
			$missing_params = missing_params.", ".$param;
		} else {}
	}

	if (!$available) {
		$response = array();
		$response['error'] = true;
		$response['message'] = 'Parameters '.substr($missing_params, 1, strlen($missingparams)).' missing.';

		echo json_decode($response);
		die();
	}

	$response = array();

	if (isset($_GET['api_call'])) {
		switch ($_GET['api_call']) {
			case 'signup':
				isParameterAvailable(array('user_fname', 'user_lname', 'email_address', 'telephone'));

				$dbOps = new Operator();

				$result = $dbOps->addUser(
					$_POST['user_fname'],
					$_POST['user_lname'],
					$_POST['email_address'],
					$_POST['telephone']
				);

				if ($result) {
					$response['error']='false';
					$response['message']='User successfully added';
					$response['User']=$result;
				} else {
					$response['error']='true';
					$response['message']='An error occured';
				}
				
				break;

			case 'signin':
				isParameterAvailable(array());
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;

			case '':
				// code...
				break;
			
			default:
				// code...
				break;
		}
	} else {
		// code...
	}
	
}
?>