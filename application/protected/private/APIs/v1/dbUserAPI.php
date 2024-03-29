<?php
require_once dirname(__FILE__).'/../../controllers/db/operations/userOperations.php';

function isParameterAvailable($params)
{
	$available = true;
	$missing_params = "";

	foreach ($params as $param) {
		if (!isset($_POST[$param]) || strlen($_POST[$param])<=0) {
			$available = false;
			$missing_params = $missing_params.", ".$param;
		} else {}
	}

	if (!$available) {
		$response = array();
		$response['error'] = true;
		$response['message'] = 'Parameters '.substr($missing_params, 1, strlen($missing_params)).' missing.';

		echo json_encode($response);
		die();
	}
}

$response = array();

if (isset($_GET['api_call'])) {
	switch ($_GET['api_call']) {
		case 'signup':
			isParameterAvailable(array('user_fname', 'user_lname', 'email_address', 'telephone', 'password'));

			$dbOps = new UserOperator();

			$result = $dbOps->addUser(
				$_POST['user_fname'],
				$_POST['user_lname'],
				$_POST['email_address'],
				$_POST['telephone'],
				$_POST['password']
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

		case 'fetchuserdetails':
			isParameterAvailable(array('user_id'));

			$dbOps = new UserOperator();

			$result = $dbOps->showUserById($_POST['user_id']);

			if ($result) {
				$response['error']='false';
				$response['message']='User details successfully fetched';
				$response['User']=$result;
			} else {
				$response['error']='true';
				$response['message']='An error occured';
			}

			break;

// No managing function yet.
		case 'signin':
			isParameterAvailable(array('email_address', 'password'));

			$dbOps = new UserOperator();

			$result = $dbOps->userAccess(
				$_POST['email_address'],
				$_POST['password']
			);

			if ($result) {
				$response['error']='false';
				$response['message']='User successfully logged in';
				$response['User']=$result;
			} else {
				$response['error']='true';
				$response['message']='An error occured';
			}

			break;

		case 'updateuserdetails':
			isParameterAvailable(array('user_id', 'user_fname', 'user_lname', 'email_address', 'telephone', 'password'));

			$dbOps = new UserOperator();

			$result = $dbOps->updateUser(
				$_POST['user_id'],
				$_POST['user_fname'],
				$_POST['user_lname'],
				$_POST['email_address'],
				$_POST['telephone'],
				$_POST['password']
			);

			if ($result) {
				$response['error']='false';
				$response['message']='User details successfully updated';
				$response['User']=$result;
			} else {
				$response['error']='true';
				$response['message']='An error occured';
			}

			break;

		case 'deleteuser':
			isParameterAvailable(array('user_id'));

			$dbOps = new UserOperator();

			$result = $dbOps->deleteUser($_POST['user_id']);

			if ($result) {
				$response['error']='false';
				$response['message']='User successfully deleted';
				$response['User']=$result;
			} else {
				$response['error']='true';
				$response['message']='An error occured';
			}

			break;

		case 'showusers':
			// isParameterAvailable(array('user_id', 'user_fname', 'user_lname', 'email_address', 'telephone'));

			$dbOps = new UserOperator();

			$result = $dbOps->showUsers(
				// $_POST['user_id'],
				// $_POST['user_fname'],
				// $_POST['user_lname'],
				// $_POST['email_address'],
				// $_POST['telephone']
			);

			if ($result) {
				$response['error']='false';
				$response['message']='Users successfully fetched';
				$response['User']=$result;
			} else {
				$response['error']='true';
				$response['message']='An error occured';
			}

			break;
	}
} else {
	$response['error'] = true; 
	$response['message'] = 'Invalid API Call';
}

echo json_encode($response);
?>