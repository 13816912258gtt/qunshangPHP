<?PHP
require_once 'comm/video.dao.php';
require_once 'comm/behaviorcredit.dao.php';
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
if($zanarr=findVideoZan($uid,$videoid)){
	$rs=array("statusCode"=>0,"Msg"=>"今天点过赞了");
}else{
	addVideoZan($uid,$videoid);
	//视频表点赞+1
	$zancount=findVideoZanCount($videoid);
	$zancount+=1;
	updateVideoZanCount($videoid,$zancount);
	//加三层行为积分
	$bili=array(1,1,1);
	for($i=0;$i<count($bili);$i++){
		$userarr=findUserByUid($uid);
		if($userarr['identity']>=0){
			addVideoZanCredit($uid);
			$rs=findUserByUid($uid);
			$credit=$rs['credit'];
			$credit+=0.1;
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
	//计算总点赞数
	$finalcount=findVideoZanCount($videoid);
	$rs=array("statusCode"=>1,"zancount"=>$finalcount);
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>