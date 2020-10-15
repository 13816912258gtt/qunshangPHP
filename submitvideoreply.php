<?PHP
require_once 'comm/video.dao.php';
require_once 'comm/user.dao.php';
require_once 'comm/behaviorcredit.dao.php';
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
$replycontent=test_input($_POST['replycontent']);
$str = preg_replace('/[\x80-\xff]{1,3}/', ' ',$replycontent, -1); 
$num = strlen($str);
$userarr=findUserByUid($uid);
$headimage=$userarr["headimage"];
$uname=$userarr["uname"];
$id=addVideoReply($videoid,$replycontent,$uid,$headimage,$uname);
if($num>10){
	
	$bili=array(1,1,1);
	for($i=0;$i<count($bili);$i++){
		$userarr=findUserByUid($uid);
		if($userarr['identity']>=0){
			addReplyCredit($uid);
			$userarr=findUserByUid($uid);
			$credit=$userarr['credit']+1;
			updateUserCredit($uid,$credit);
		}
		if(findPreinviteid($uid)!=0){
			$uid=findPreinviteid($uid);
		}else{
			break;
		}
	}
	
	//转换群币 10000积分转换一个
	$userarr=findUserByUid($uid);
	$quncoin=$userarr['quncoin'];
	$creditcoin=$userarr['credit'];
	if($creditcoin>=10000){
		for($i=0;$i<(int)($creditcoin/10000);$i++){
		$creditcoin=$creditcoin-10000;
		updateUserCredit($uid,$creditcoin);
		addChangeCoin($uid);
		$quncoin=$quncoin+1;
		updateUserCoin($uid,$quncoin);
		}
	}
	
}
$replyarr=findVideoReplyById($id);
$rs=array("statusCode"=>"1","Msg"=>"添加评论成功","replyarr"=>$replyarr);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>