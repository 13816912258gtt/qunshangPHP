<?php 
	$phoneData = $_POST['phoneData'];
	$checkCode = $_POST['checkCode'];
	$identity =0;
	$bizId = $_POST['bizId'];
	// echo $phoneData."\n";
	// echo $passData."\n";
// 	echo "bizId:".$bizId."code:".$checkCode;
	
	require_once 'comm/user.dao.php';
	require_once 'comm/behaviorcredit.dao.php';
	require_once './comm/code.dao.php';
	if(!empty($_POST['invitedPeople'])){
		$invitedPeople = $_POST['invitedPeople'];
		$inviteid=findUserByInvited($invitedPeople);
	}else{
		$inviteid=0000000001;
	}
	$res = checkCode($bizId,$checkCode);
	if($res==="OK"){
	    if(findUserByPhone($phoneData)){
    		$arr=array('statusCode'=>2,'errMsg'=>"手机号已注册");
    		echo json_encode($arr,JSON_UNESCAPED_UNICODE);	
	    }else{
			if($inviteid==0000000001){
				$result=addUser($phoneData,$identity,$inviteid);
				updatePartnerid($result,$result);
			}else{
				$invitearr=findUserByUid($inviteid);
				$partnerid=$invitearr['partnerid'];
				$result=addUser($phoneData,$identity,$inviteid);
				updatePartnerid($result,$partnerid);
			}
		//	$result=addUser($phoneData,$identity,$inviteid);
    		//此处减去了密码，数据库与一些dao成需要改变
    		$invitearr=findUserByUid($inviteid);
			//邀请人的邀请人数+1，行为积分+100，更新行为积分动态
			$invitenum=$invitearr['invitenum']+1;
			updateInviteNum($inviteid,$invitenum);
			
			$bili=array(1,1,1);
			for($i=0;$i<count($bili);$i++){
				$invitearr=findUserByUid($inviteid);
				if($invitearr['identity']>=0){
					$credit=$invitearr['credit']+100;
					updateUserCredit($inviteid,$credit);
					addMemberCredit($inviteid);
				}
				if(findPreinviteid($inviteid)!=0){
					$inviteid=findPreinviteid($inviteid);
				}else{
					break;
				}
			}
			/*
			addMemberCredit($inviteid);
			$credit=$invitearr['credit']+100;
			updateUserCredit($inviteid,$credit);
			*/
			
    		$userid=$result;
    		//把邀请信息加入邀请表
			$inviteridentity=$invitearr['identity'];
			addInviteInfo($userid,0,$inviteid,$inviteridentity);
			if($inviteid!=0000000001){
				$preid=findPreinviteid($inviteid);
				$prearr=findUserByUid($preid);
				$preidentity=$prearr['identity'];
				addInviteInfo($userid,0,$preid,$preidentity);
			}
    		$invitecode=createInviteCode($userid);
    		updateInviteCode($invitecode,$userid);
    		$arr=array('statusCode'=>1,'photoDate'=>$phoneData);
    		echo json_encode($arr,true);	
    	}
	}else{
	    $arr = array('statusCode'=>2,'errMsg'=>$res.status);
	    echo json_encode($arr,JSON_UNESCAPED_UNICODE);	
	}
	
	//检验验证码
function checkCode($bizId,$code){
    // $res = array();
    $paramFlag = isset($bizId)&&isset($code);
    if(!$paramFlag){
        $res = 'Parameter Missing';
    }else{
        $query = findCodeByBizId($bizId);
        if(empty($query)){
            $res = 'Wrong BizId';
        }else{
            if($query['code']==$code){
                $res = 'OK';
            }else{
                $res = 'Wrong Code';
        }
    }
}
return $res;
}
?>