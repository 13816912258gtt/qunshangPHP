<?PHP
require_once 'comm/video.dao.php';
$replyid=$_POST['replyid'];
$videoreplyarr=findVideoReplyById($replyid);
$likenum=$videoreplyarr["likenum"]+1;
updateReplyLikenum($replyid,$likenum);
$rs=array("statusCode"=>"1","Msg"=>"点赞成功");
echo json_encode($replylist,JSON_UNESCAPED_UNICODE);
?>