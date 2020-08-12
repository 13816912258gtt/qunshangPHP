<?PHP
require_once 'comm/video.dao.php';
require_once 'comm/user.dao.php';
$uid=$_POST['uid'];
$videoid=$_POST['videoid'];
$replycontent=test_input($_POST['replycontent']);
$userarr=findUserByUid($uid);
$headimage=$userarr["headimage"];
$uname=$userarr["uname"];
addVideoReply($videoid,$replycontent,$uid,$headimage,$uname);
$rs=array("statusCode"=>"1","Msg"=>"添加评论成功");
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>