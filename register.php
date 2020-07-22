<?php 
	$phoneData = $_POST['phoneData'];
	$passData = $_POST['passData'];
	$preidentity = $_POST['identity'];
	// echo $phoneData."\n";
	// echo $passData."\n";
	include('comm/user.php');
	if(findUserByPhone($phoneData)){
		$arr=array('statusCode'=>2,'errMsg'=>"手机号已注册");
		echo json_encode($arr);	
	}else{
		$result=addUser($phoneData,$passData,$preidentity);
		$userid=$result;
		$invitecode=createInviteCode($userid);
		updateInviteCode($invitecode,$userid);
		$arr=array('statusCode'=>1,'photoDate'=>$phoneData);
		echo json_encode($arr);	
	}
	
?>