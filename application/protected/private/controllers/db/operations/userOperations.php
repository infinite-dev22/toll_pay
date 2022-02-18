<?php
/**
 * 
 */
class UserOperator
{
	private $con;
	
	function __construct()
	{
		require_once dirname(__FILE__).'/../connector/Connect.php';
		$db = new Connector();
		$this->con = $db->connect();
	}

	function addUser($user_fname, $user_lname, $email_address, $telephone, $password)
	{
		$statement = $this->con->prepare("INSERT INTO users(user_fname, user_lname, email_address, telephone, password) VALUES ($user_fname, $user_lname, $email_address, $telephone, $password)");

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

				array_push($user, $details);
			}

			return $user;
			$statement->close();
		} else{
			return false;
			$statement->close();
		}
	}
	function updateUser($user_id, $user_fname, $user_lname, $email_address, $telephone, $password)
	{
		$statement = $this->con->prepare("UPDATE users SET user_id='$user_id', user_fname='$user_fname', user_lname='$user_lname', email_address='$email_address', telephone='$telephone', password='$password' WHERE user_id='$user_id'");
		
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

				array_push($users, $user);
			}
			return $users;
			$statement->close();
		} else {
			return false;
			$statement->close();
		}
	}
}
?>