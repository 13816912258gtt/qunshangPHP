<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/video.dao.php';
require_once 'comm/live.dao.php';
$uid=$_POST['uid'];
$uname=test_input($_POST['uname']);
$str = preg_replace('/[\x80-\xff]{1,3}/', ' ',$uname, -1); 
$num = strlen($str);
if($num>7 || $num<2){
	$statusCode=1;
	$Msg="用户名长度错误";
	$rs=array("statusCode"=>$statusCode,"Msg"=>$Msg);
}else{
	updateUname($uid,$uname);
	if(findVideosByUid($uid)){
		updateVideoUname($uid,$uname);
	}
	if(findReplyByUid($uid)){
		updateVideoReplyUname($uid,$uname);
	}
	if(findLiveByLiverid($uid)){
		updateLiverNmae($uid,$uname);
	}
	if(findAudienceByLiverid($uid)){
		updateLiveAudienceUname($uid,$uname);
	}
	if(findAGiftByUid($uid)){
		updateGiveUname($uid,$uname);
	}
	if(findLGiftByLiverid($uid)){
		updateGetUname($uid,$uname);
	}
	$statusCode=0;
	$rs=array("statusCode"=>$statusCode,"uname"=>$uname);
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>