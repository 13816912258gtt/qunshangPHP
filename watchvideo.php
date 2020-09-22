<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/behaviorcredit.dao.php';
$uid=(int)$_POST['uid'];
addWatchVideo($uid);
$userarr=findUserByUid($uid);
$credit=$userarr['credit']+0.3;
$rs=updateUserCredit($uid,$credit);
if($rs){
	$result=array("statusCode"=>1);
}else{
	$result=array("statusCode"=>2);
}
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>