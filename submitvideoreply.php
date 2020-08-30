<?PHP
require_once 'comm/video.dao.php';
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
$replycontent=test_input($_POST['replycontent']);
$userarr=findUserByUid($uid);
$headimage=$userarr["headimage"];
$uname=$userarr["uname"];
$id=addVideoReply($videoid,$replycontent,$uid,$headimage,$uname);
$replyarr=findVideoReplyById($id);
$rs=array("statusCode"=>"1","Msg"=>"添加评论成功","replyarr"=>$replyarr);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>