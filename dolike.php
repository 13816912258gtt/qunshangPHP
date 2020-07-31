<?PHP
$uid=$_GET['uid'];
$videoid=$_GET['videoid'];
require_once 'comm/video.dao.php';
if(findVideoLikeByUid($uid,$videoid)){
	deleteVideoLike($videoid,$uid);
}else{
	addVideoLike($videoid,$uid);
}
$likecount=findVideoLikeCount($videoid);
$arr=array('likecount'=>$likecount);
echo json_encode($arr);
?>