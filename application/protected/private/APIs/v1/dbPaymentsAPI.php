<?php
require_once dirname(__FILE__).'/../../controllers/db/operations/paymentOperations.php';

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
		case 'makepayment':
			isParameterAvailable(array('user_id', 'car_plate', 'amount', 'bar_code', 'qr_code', 'date_payed', 'duration', 'validity'));

			$dbOps = new PaymentsOperator();

			$result = $dbOps->makePayment(
				$_POST['user_id'],
				$_POST['car_plate'],
				$_POST['amount'],
				$_POST['bar_code'],
				$_POST['qr_code'],
				$_POST['date_payed'],
				$_POST['duration'],
				$_POST['validity']
				// $_POST[''],
			);

			if ($result) {
				$response['error']=false;
				$response['message']='Payment record stored successully.';
				$response['payment']=$result;
			} else {
				$response['error']=true;
				$response['message']='An error occured, Payment record not stored.';
			}
			
			break;

		case 'showpayment':
			isParameterAvailable(array('payment_id'));

			$dbOps = new PaymentsOperator();

			$result = dbOps->showPaymentById($_POST['payment_id']);

			if ($result) {
				$response['error']=false;
				$response['message']='Payment record fetched successully.';
				$response['payment']=$result;
			} else {
				$response['error']=true;
				$response['message']='An error occured, Payment record not fetched.';
			}

			break;

		case 'showpayments':
			$dbOps = new PaymentsOperator();

			$result = $dbOps->showPayments();

			if ($result) {
				$response['error']=false;
				$response['message']='Payment records fetched successully.';
				$response['payment']=$result;
			} else {
				$response['error']=true;
				$response['message']='An error occured, Payment records not fetched.';
			}

			break;
	}
}
?>