<?php
require_once dirname(__FILE__).'../../controllers/operations/paymentOperations.php';

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
}

$response = array();

if (isset($_GET['api_call'])) {
	switch ($_GET['api_call']) {
		case 'pay':
			isParameterAvailable(array('user_id', 'car_plate', 'amount', 'bar_code', 'qr_code', 'date_payed', 'duration', 'validity'));

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
	}
}
?>