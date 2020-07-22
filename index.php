<?php
	$token = $_GET['token'];
	$uid = $_GET['uid'];
	require_once 'comm/userToken.dao.php';
	$rs=updateLoginStatus($token,$uid);
	if($rs){
		$arr=array('statusCode'=>1,'Msg'=>"成功");
	}else{
		$arr=array('statusCode'=>2,'errMsg'=>"失败");
	}
	echo json_encode($arr);
?>
	