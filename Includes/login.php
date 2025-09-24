<?php

class Logins extends Dbh {

	protected function getUser($uid, $pwd){
		$stmt = $this->connect()->prepare('SELECT `username`,`password` FROM account WHERE `username` = ?');
		
		$stmt->execute(array($uid));

		if(!$stmt->execute(array($uid))){
				$stmt = null;
				header("location: ../Php/Displaylist/index.php?error=StatementFailed!");
				exit();
		}
		if($stmt->rowCount() == 0){
			$stmt = null;
				header("location: ../Php/Displaylist/index.php?error=UsernotFound!");
				exit();
		}

		//hasing part 
		$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$checkHashed= password_verify($pwd , $pwdHashed[0]['password']);  

		if($checkHashed == false ){
			$stmt = null;
			header("location: ../Php/Displaylist/index.php?error=PasswordIncorrect!");
				exit();
		}else if($checkHashed == true){
			$stmt = $this->connect()->prepare('SELECT `username`, `password` FROM account WHERE `username` = ?  ' );

			if(!$stmt->execute(array($uid))){
				$stmt = null;
				header("location: ../Php/Displaylist/index.php?error=StatementFailed!");
				exit();
			}
			if($stmt->rowCount() == 0){
			$stmt = null;
				header("location: ../Php/Displaylist/index.php?error=UsernotFound!");
				exit();
			}

			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			$_SESSION["usermame"] = $user[0]["username"];		
			$_SESSION["password"] = $user[0]["password"];		
		}


		$stmt = null;




		// if($stmt->rowcount() == 0){
		// 	$stmt = null;
		// 	header("location: ../Php/Displaylist/index.php?error=usernameIncorrect");
		// 	exit();
		// }
	//ito po ginawa  ko
		// if(!$stmt->rowcount() == 0){
		// 	//$stmt = null;
		// 	while($stmt != $uid){
		// 		header("location: ../Php/Displaylist/index.php?error=usernameIncorrect");
		// 	exit();
		// 	}
		// 	while($row = $uid['username']){
		// 		header("location: ../Php/Displaylist/index.php?error=UsernameCorrect");
		// 	exit();
		// 	}
			
		// }
		
		// if ($stmt->rowCount() == 0){
		// 	$stmt = null;
		// 	header("location: ../Php/Displaylist/index.php?error=usernotfound");
		// 	exit();
		//  } //else if($stmtp->rowCount() == 0) {
		// 	$stmt = null;
		// 	header("location: ../Php/Displaylist/index.php?error=wrongpassword");
		// 	exit();
			
		// }
		
	
		
	}

	// protected function getPass($pwd){
	// 	$stmt = $this->connect()->prepare('SELECT `password` FROM account WHERE `password` = ?');
		
	// 	if(!$stmt->execute(array($pwd))){
	// 	$stmt = null;
	// 	header("location: ../Php/Displaylist/index.php?error=passwordIncorrect");
	// 	exit();
	// 	}
		
		// if ($stmt->rowCount() == 0){
		// 	$stmt = null;
		// 	header("location: ../Php/Displaylist/index.php?error=usernotfound");
		// 	exit();
		//  } //else if($stmtp->rowCount() == 0) {
		// 	$stmt = null;
		// 	header("location: ../Php/Displaylist/index.php?error=wrongpassword");
		// 	exit();
			
		// }
		
	
		
	}


?>