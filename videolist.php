<?PHP
$uid=$_GET['uid'];
require_once 'comm/video.dao.php';
require_once 'comm/videolike.dao.php';
require_once 'comm/videoreply.dao.php';
function pushVideoList($uid){
	//得到video的总数，循环次数为最大值(到时候再改……)
	$videocount=findVideoCount();
	$n=$videocount['num'];
	//得到所有video的信息并且打乱顺序作为随机
	$rs=findVideos();
	shuffle($rs);
	for($i=0;$i<$n;$i++){
		//设置状态码为1，加入点赞数属性和评论数属性以及用户是否点过赞
		$rs[$i]['statusCode']=1;
		$videoid=$rs[$i]['videoid'];
		$likecount=findVideoLikeCount($videoid);
		$replycount=findVideoReplyCount($videoid);
		$islike=false;
		if(findVideoLikeByUid($videoid,$uid)){
			$idlike=true;
		}
		$rs[$i]['likecount']=$likecount;
		$rs[$i]['replycount']=$replycount;
		$rs[$i]['islike']=$islike;
	}
	echo json_encode($rs);	
}
?>