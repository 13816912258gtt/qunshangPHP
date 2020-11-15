<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/behaviorcredit.dao.php';
$uid=(int)$_POST['uid'];

$bili=array(1,1,1);
	for($i=0;$i<count($bili);$i++){
		$userarr=findUserByUid($uid);
		if($userarr['identity']>=0){
			addWatchVideo($uid);
			$userarr=findUserByUid($uid);
			$credit=$userarr['credit']+0.3;
			$rs=updateUserCredit($uid,$credit);
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

if($rs){
	$result=array("statusCode"=>1);
}else{
	$result=array("statusCode"=>2);
}
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>