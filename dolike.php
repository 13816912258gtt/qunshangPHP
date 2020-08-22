<?PHP
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
require_once 'comm/video.dao.php';
if(findVideoLikeByUid($videoid,$uid)){
	deleteVideoLike($videoid,$uid);
	$code=1;
}else{
	addVideoLike($videoid,$uid);
	$code=0;
}
$likecount=findVideoLikeCount($videoid);
$arr=array("statusCode"=>$code,"likecount"=>$likecount);
echo json_encode($arr);
?>