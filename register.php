<?php 
	$phoneData = $_POST['phoneData'];
	$checkCode = $_POST['$checkCode'];
	$identity = $_POST['identity'];
	$bizId = $_POST['bizId'];
	// echo $phoneData."\n";
	// echo $passData."\n";
	include('comm/user.dao.php');
	require_once './comm/code.dao.php';
	if(isset($_POST['invitedPeople'])){
		$invitedPeople = $_POST['$invitedPeople'];
		$inviteid=findUserByInvited($invitedPeople);
	}else{
		$inviteid=0000000001;
	}
	$res = checkCode($bizId,$code);
	if($res.status==="OK"){
	    if(findUserByPhone($phoneData)){
    		$arr=array('statusCode'=>2,'errMsg'=>"手机号已注册");
    		echo json_encode($arr);	
	    }else{
    		$result=addUser($phoneData,$identity,$inviteid);//此处减去了密码，数据库与一些dao成需要改变
    		$userid=$result;
    		$invitecode=createInviteCode($userid);
    		updateInviteCode($invitecode,$userid);
    		$arr=array('statusCode'=>1,'photoDate'=>$phoneData);
    		echo json_encode($arr);	
    	}
	}else{
	    $arr = array('statusCode'=>2,'errMsg'=>$res.status);
	    echo json_encode($arr);	
	}
	
	//检验验证码
function checkCode($bizId,$code){
    $res = array();
    $paramFlag = isset($bizId)&&isset($code);
    if(!$paramFlag){
        $res['status'] = 'Parameter Missing';
    }else{
        $query = findCodeByBizId($bizId);
        if(empty($query)){
            $res['status'] = 'Wrong BizId';
        }else{
            if($query['code']==$code){
                $res['status'] = 'OK';
            }else{
                $res['status'] = 'Wrong Code';
        }
    }
}

return json_encode($res);
}
?>