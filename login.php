<?php
	$phoneData = $_POST['phoneData'];
	$passData = $_POST['passData'];
	require_once 'comm/user.dao.php';
	if(!findUserByPhone($phoneData)){
		$arr=array('statusCode'=>3,'errMsg'=>"手机号未注册");
	}else{
		$result=findUserByPhone($phoneData);
		if($result['upass']!=$passData){
			$arr=array('statusCode'=>2,'errMsg'=>"密码不正确");
		}else{
			$uid=$result['uid'];
			$uname=$result['uname'];
			$utel=$result['utel'];
			$identity=$result['identity'];
			$invitecode=$result['invitecode'];
			$headimage=$result['headimage'];
			$gender=$result['gender'];
			$introduce=$result['introduce'];
			$regtime=$result['regtime'];
			$inviteid=$result['inviteid'];
			$invitenum=$result['invitenum'];
			$credit=$result['credit'];
			$wallet=$result['wallet'];
			$address=$result['address'];
			$arr=array('statusCode'=>1,'Msg'=>"登录成功",'userInfo'=>array('uid'=>$uid,'utel'=>"$utel",'uname'=>"$uname",'headimage'=>"$headimage",'gender'=>$gender,'introduce'=>"$introduce",'identity'=>$identity,'regtime'=>"$regtime",'invitecode'=>"$invitecode",'inviteid'=>$inviteid,'invitenum'=>$invitenum,'credit'=>$credit,'wallet'=>$wallet,"address"=>$address));
		}
	}
	echo json_encode($arr);	
?>