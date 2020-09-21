<?PHP
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
require_once 'comm/video.dao.php';
require_once 'comm/behaviorcredit.dao.php';
require_once 'comm/user.dao.php';
if($likearr=findVideoLikeByUid($videoid,$uid)){
	$likeid=$likearr['likeid'];
	$creditid=findVideoLikeById($likeid);
	deleteVideoLike($videoid,$uid);
	deleteVideoCredit($creditid);
	$rs=findUserByUid($uid);
	$credit=$rs['credit'];
	$credit-=0.1;
	updateUserCredit($uid,$credit);
	$code=1;
}else{
	$videoarr=findVideoByVideoid($videoid);
	$publishid=$videoarr['publishid'];
	addVideoLike($videoid,$uid,$publishid);
	$creditid=addVideoCredit($uid);
	updateVideoCredit($videoid,$creditid);
	$rs=findUserByUid($uid);
	$credit=$rs['credit'];
	$credit+=0.1;
	updateUserCredit($uid,$credit);
	$code=0;
}
$likecount=findVideoLikeCount($videoid);
$arr=array("statusCode"=>$code,"likecount"=>$likecount);
echo json_encode($arr);
?>