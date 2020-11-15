<?PHP
require_once 'comm/video.dao.php';
$videoid=(int)$_POST['videoid'];
$replylist=array();
$replyhotarr=findHotVideoReplyById($videoid);
$hotid=array();
foreach($replyhotarr as $v){
	array_push($hotid,$v["replyid"]);
	$replylistarr=array(array("replyid"=>$v['replyid'],"replycontent"=>$v['replycontent'],"headimage"=>$v["headimage"],"uname"=>$v["uname"],"likenum"=>$v["likenum"],"replytime"=>$v["replytime"]));
	$replylist=array_merge_recursive($replylist,$replylistarr);
}
$replynewarr=findNewVideoReplyById($videoid);
foreach($replynewarr as $x){
	if(!in_array($x["replyid"],$hotid)){
		$replylistarr=array(array("replyid"=>$x['replyid'],"replycontent"=>$x['replycontent'],"headimage"=>$x["headimage"],"uname"=>$x["uname"],"likenum"=>$x["likenum"],"replytime"=>$x["replytime"]));
		$replylist=array_merge_recursive($replylist,$replylistarr);
	}
}
echo json_encode($replylist,JSON_UNESCAPED_UNICODE);
?>