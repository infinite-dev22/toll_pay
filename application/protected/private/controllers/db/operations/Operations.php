<?php
/**
 * 
 */
class Operator
{
	private $con;
	
	function __construct(argument)
	{
		require_once dirname(__FILE__).'../connector/Connect.php';
		$db = new Connector();
		$this->con = $db.connect();
	}

	/**
	 *FUNCTIONS TO PERFORM CRUD OPERATIONS ON THE  USER TABLE.
	 */
	function addUser($user_fname, $user_lname, $email_address, $telephone)
	{
		$statement = $this->con->prepare("INSERT INTO users(user_fname, user_lname, email_address, telephone) VALUES ($user_fname, $user_lname, $email_address, $telephone)");

		if ($statement->execute()) {
			return true;
			$statement->close();
		} else{
			return false;
			$statement->close();
		}
	}
	function showUserById($user_id)
	{
		$statement = $this->con->prepare("SELECT user_id, user_fname, user_lname, email_address, telephone FROM users WHERE user_id='$user_id'");

		if ($statement->execute()) {
			$statement->bind_result($user_id, $user_fname, $user_lname, $email_address, $telephone);

			$user = array();
			while ($statement->fetch()) {
				$details =  array();
				$details['user_id']=$user_id;
				$details['user_fname']=$user_fname;
				$details['user_lname']=$user_lname;
				$details['email_address']=$email_address;
				$details['telephone']=$telephone;
			}
			array_push($user, $details);

			return $user;
			$statement->close();
		} else{
			return false;
			$statement->close();
		}
	}
	function updateUser($user_id, $user_fname, $user_lname, $email_address, $telephone)
	{
		$statement = $this->con->prepare(UPDATE users SET user_id='$user_id', user_fname='$user_fname', user_lname='$user_lname', email_address='$email_address', telephone='$telephone' WHERE user_id='$user_id');
		
		if ($statement->execute()) {
			return true;
			$statement->close();
		} else{
			return false;
			$statement->close();
		}

	}
	function deleteUser($user_id)
	{
		$statement = $this->con->prepare("DELETE FROM users WHERE user_id='$user_id'");

		if ($statement->execute()) {
			return true;
			$statement->close();
		} else{
			return false;
			$statement->close();
		}                                      
	}
	function showUsers()
	{
		$statement = $this->con->prepare("SELECT user_id, user_fname, user_lname, email_address, telephone FROM users ORDER BY user_fname DESC LIMIT 5");

		if ($statement->execute()) {
			$statement->bind_result($user_id, $user_fname, $user_lname, $email_address, $telephone);

			$users = array();
			while ($statement->fetch()) {
				$user = array();
				$user['user_id']=$user_id;
				$user['user_fname']=$user_fname;
				$user['user_lname']=$user_lname;
				$user['email_address']=$email_address;
				$user['telephone']=$telephone;
			}
			array_push($users, $user);
			return $users;
			$statement->close();
		} else {
			return false;
			$statement->close();
		}
	}

	/**
	 *FUNCTIONS TO PERFORM CRUD OPERATIONS ON THE  PAYMENTS TABLE. 
	 */
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
?>