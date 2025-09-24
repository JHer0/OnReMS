<?php
class LoginF extends Logins {
	
	private $uid;
	private $pwd;
	
	public function __construct($uid,$pwd){
		
	    $this->uid = $uid;
	    $this->pwd = $pwd;
    }
	public function loginUser(){
		if($this->emptyInput() == false){
			header("location: ../Php/Displaylist/index.php?error=emptyinput");
		exit();
	    }
	
        // $this->getUser($this->uid);
		 $this->getUser($this->uid, $this->pwd);
    } 

    private function emptyInput(){
	    $result; 
	    if(empty($this->uid) || empty($this->pwd)){
		$result = false;
	    }  
	    else { 
	        $result = true;
	    }
	    return $result;
    }


	// private function passwordCheck(){
	//     $result;
	// 	$check_username = $row['username'];
    //     $check_password = $row['password'];

	//     if(empty($this->pwd) || empty($this->pwd)){
	// 	$result = false;
	//     }
	//     else {
	//         $result = true;
	//     }
	//     return $result;
    // }
}
