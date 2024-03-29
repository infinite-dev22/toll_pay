<?php
/**
 * 
 */
class PaymentsOperator
{
	private $con;
	
	function __construct()
	{
		require_once dirname(__FILE__).'/../connector/Connect.php';
		$db = new Connector();
		$this->con = $db.connect();
	}

	function makePayment($user_id, $car_plate, $amount, $bar_code, $qr_code, $date_payed, $duration, $validity)
	{
		$statement = $this->con->prepare("INSERT INTO payments (user_id, car_plate, amount, bar_code, qr_code, date_payed, duration, validity) VALUES ($user_id, $car_plate, $amount, $bar_code, $qr_code, $date_payed, $duration, $validity)");


		if ($statement->execute()) {
			return true;
			$statement->close();
		} else {
			return false;
			$statement->close();
		}
	}

	function showPaymentById($payment_id)
	{
		$statement->con->prepare("SELECT payment_id, user_id, car_plate, amount, bar_code, qr_code, date_payed, duration, validity FROM payments WHERE payment_id='$payment_id'");

		if ($statement->execute()) {
			$statement->bind_result($user_id, $car_plate, $amount, $bar_code, $qr_code, $date_payed, $duration, $validity);

			$payment = array();
			while ($statement->fetch()) {
				$details = array();
				$details['payment_id']=$payment_id;
				$details['user_id']=$user_id;
				$details['car_plate']=$car_plate;
				$details['amount']=$amount;
				$details['bar_code']=$bar_code;
				$details['qr_code']=$qr_code;
				$details['date_payed']=$date_payed;
				$details['duration']=$duration;
				$details['validity']=$validity;
			}
			array_push($payment, $details);
			return $payment;
			$statement->close();
		} else {
			return false;
			$statement->close();
		}
	}
	
	function showPayments()
	{
		$statement->con->prepare("SELECT payment_id, user_id, car_plate, amount, bar_code, qr_code, date_payed, duration, validity FROM payments DESC LIMIT 5");

		if ($statement->execute()) {
			return true;
			$statement->close();
		} else {
			return false;
			$statement->close();
		}
	}
}