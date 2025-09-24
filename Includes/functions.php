<?php
	SESSION_START();
	if(isset($_POST['login'])){
		$uid = $_POST["usern"];
		$pwd = $_POST["paswd"];
		?><script type="text/javascript">alert("working here")</script><?php
	}
	
	//includes here
	include 'connection.inc.php';
	include 'login.php';
	include 'loginf.php';
	$login = new LoginF($uid, $pwd);
	
	$login->loginUser();
	$_SESSION['user'] = $uid;
	$_SESSION['admin'] = "admin@alicf.com";
	$_SESSION['chairsec'] = "chairsec@alicf.com";
	$_SESSION['pic'] = "pic@alicf.com";
	
	
	header('location: ../Php/Displaylist/accountUI.php');
?>