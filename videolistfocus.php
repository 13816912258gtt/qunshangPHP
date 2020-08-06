<?PHP
$uid=$_GET['uid'];
require_once 'comm/video.dao.php';
	//得到关注的人的video数组
	$focusvideoarr=findFocusVideoByUid($uid);
	$n=10;
	//得到所有video的信息并且打乱顺序作为随机
	$videolist=array();
	for($i=0;$i<$n;$i++){
		$videoid=$focusvideoarr[$i]['videoid'];
			$likecount=findVideoLikeCount($videoid);
			$replycount=findVideoReplyCount($videoid);
			$islike=false;
			if(findVideoLikeByUid($videoid,$uid)){
				$islike=true;
			}
			$isfocus=false;
			if(findVideoFocus($uid,$focusvideoarr[$i]['uid'])){
				$isfocus=true;
			}
			$videolistarr=array(array('videoid'=>$videoid,'url'=>$focusvideoarr[$i]['url'],'posterurl'=>$focusvideoarr[$i]['posterurl'],'videodesc'=>$focusvideoarr[$i]['videodesc'],'uid'=>$focusvideoarr[$i]['uid'],'uname'=>$focusvideoarr[$i]['uname'],'headimage'=>$focusvideoarr[$i]['headimage'],'productid'=>$focusvideoarr[$i]['productid'],'publishtime'=>$focusvideoarr[$i]['publishtime'],'islike'=>$islike,'isfocus'=>$isfocus,'likecount'=>$likecount,'replycount'=>$replycount));
			$videolist=array_merge_recursive($videolist,$videolistarr);
	}
	echo json_encode($videolist,JSON_UNESCAPED_UNICODE);
?>