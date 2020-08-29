<?PHP
require_once 'comm/order.dao.php';
$uid=(int)$_POST['uid'];
$defaultaddressarr=findDefaultAddressList($uid);
$addresslist=array(array("addressid"=>$defaultaddressarr['addressid'],"defaultaddress"=>$defaultaddressarr['defaultaddress'],"urealname"=>$defaultaddressarr['urealname'],"utel"=>$defaultaddressarr['utel'],"realaddress"=>$defaultaddressarr['Realaddress']));
$otheraddress=findOtherAddressList($uid);
foreach($otheraddress as $v){
	$otheraddress=array(array("addressid"=>$v['addressid'],"defaultaddress"=>$v['defaultaddress'],"urealname"=>$v['urealname'],"utel"=>$v['utel'],"realaddress"=>$v['Realaddress']));
	$addresslist=array_merge_recursive($addresslist,$otheraddress);
}
echo json_encode($addresslist,JSON_UNESCAPED_UNICODE);
?>