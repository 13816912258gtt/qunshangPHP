<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/video.dao.php';
require_once 'comm/live.dao.php';
$imgname = $_FILES['headimgFile']['name'];
$tmp = $_FILES['headimgFile']['tmp_name'];
$uid=(int)$_POST['uid'];
$filepath = 'headimg/';
if(move_uploaded_file($tmp,$filepath.$imgname)){
	$headimage='http://www.equnshang.com/'.$filepath.$imgname;
	updateUserHeadimage($uid,$headimage);
	if(findVideosByUid($uid)){
		updateHeadimg($uid,$headimage);
	}
	if(findReplyByUid($uid)){
		updateReplyHeadimg($uid,$headimage);
	}
	if(findLiveByLiverid($uid)){
		updateLiveHead($uid,$headimage);
	}
	if(findAudienceByLiverid($uid)){
		updateAudienceHead($uid,$headimage);
	}
	if(findAGiftByUid($uid)){
		updateAGiftHead($uid,$headimage);
	}
	if(findLGiftByLiverid($uid)){
		updateLGiftHead($uid,$headimage);
	}
	$rs=array("statusCode"=>"1","imgurl"=>$headimage);
}else{
	$rs=array("statusCode"=>"2","Msg"=>"上传失败");
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>