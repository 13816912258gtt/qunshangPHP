<?PHP
require_once 'comm/video.dao.php';
require_once 'comm/user.dao.php';
$keyword=$_POST['keyword'];
$videolist=array();
if(isset($keyword)){
	$keyword=test_input($_POST['keyword']);
	$videoarr=findVideoByKey($keyword);
	foreach($videoarr as $rs){
		$videoid=$rs['videoid'];
		$likecount=findVideoLikeCount($videoid);
		$videolistarr=array(array('videoid'=>$videoid,'posterurl'=>$rs['posterurl'],'videodesc'=>$rs['videodesc'],'uname'=>$rs['uname'],'headimage'=>$rs['headimage'],'likecount'=>$likecount));
		$videolist=array_merge_recursive($videolist,$videolistarr);
	}
}
echo json_encode($videolist,JSON_UNESCAPED_UNICODE);	
?>