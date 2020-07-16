<?php
	$token = $_GET['token'];
	$uid = $_GET['uid'];
	include('comm/userToken.dao.php');
	$rs=updateLoginStatus($token);
	$result=updateLoginUid($uid,$token);
	if($rs && $result){
		$arr=array('statusCode'=>1,'Msg'=>"成功");
	}else{
		if(!$rs){
			$arr=array('statusCode'=>2,'errMsg'=>"token失败");
			break;
		}
	
		if(!$result){
			$arr=array('statusCode'=>3,'errMsg'=>"uid失败");
		}
	}
	echo json_encode($arr);
?>
	