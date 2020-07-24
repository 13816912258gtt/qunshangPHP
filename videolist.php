<?PHP
$uid=$_GET['uid'];
require_once 'comm/video.dao.php';
function pushVideoList($uid){
	//得到video的总数，随机生成1到总数的数组
	$videocount=findVideoCount();
	$vcount=$videocount['num'];
	$number=range(1,$vcount);
	shuffle($number);
	$n=10;
	//得到所有video的信息并且打乱顺序作为随机
	$videolist=array();
	for($i=0;$i<$n;$i++){
		$videoid=$number[$i];
		if($rs=findVideoByVideoid($videoid)){
			$likecount=findVideoLikeCount($videoid);
			$replycount=findVideoReplyCount($videoid);
			$islike=false;
			if(findVideoLikeByUid($videoid,$uid)){
				$idlike=true;
			}
			$videolistarr=array('videoid'=>$videoid,'url'=>$rs['url'],'posterurl'=>$rs['posterurl'],'videodesc'=>$rs['videodesc'],'publishid'=>$rs['publishid'],'publishtime'=>$rs['publishtime'],'islike'=>$islike,,'likecount'=>$likecount,,'replycount'=>$replycount);
			$videolist=array_merge_recursive($videolist,$videolistarr);
		}else{
			$i=$i-1;
		}
	echo json_encode($videolist);	
}
?>