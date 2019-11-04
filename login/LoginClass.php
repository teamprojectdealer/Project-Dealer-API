<?php
require 'User.php';

class Login{

    private $conn; 
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function login($username,$password){
        $loginStat = "fail";

		$userDetailsFromDatabase = $this->getUser($username);

		if( $userDetailsFromDatabase->getId() == 0 ){
			$loginStat = "unregistered";
		}else{
			
			if( password_verify( $password,  $userDetailsFromDatabase->getPassword() ) ){
				//set session variables
				$loginStat = "success";
			}else{
				$loginStat = "missmatch";
			}

		}

		return $loginStat;
    }


    private function getUser($value){
        $q = "SELECT * FROM users WHERE username = ? ";
		$qs = $this->conn->prepare($q);
		$qs->bind_param("s",$value);
		$qs->execute();
        $qs->store_result();
        
        $user = new User();

		if ( $qs->num_rows == 0 ) {
			// id = 0 implies no row fetched
			// that means no user found
			$user->setId(0);
		}else{
			$qs->bind_result($id,$username,$password,$fullname,$gender,$type,$profilePic,$email,$amount);

			if ($qs->fetch()) {
				$user->setId($id);
				$user->setUsername($username);
				$user->setPassword($password);
				$user->setFullName($fullname);
				$user->setGender($gender);
				$user->setType($type);
				$user->setProfilePic($profilePic);
				$user->setEmail($email);
				$user->setAmount($amount);
			}
		}

		$qs->free_result();
		$qs->close();

		return $user;
    }

}


?>