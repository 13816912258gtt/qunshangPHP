<?PHP
$uid=(int)$_POST['uid'];
$urealname=$_POST['urealname'];
$utel=$_POST['utel'];
$realaddress=$_POST['realaddress'];
$defaultaddress=(int)$_POST['defaultaddress'];
require_once 'comm/order.dao.php';
require_once 'comm/user.dao.php';
$addressid=addShippingAddress($uid,$defaultaddress,$urealname,$utel,$realaddress);
if($defaultaddress==1){
	updateDefaultAddress($uid,$addressid);
}
$newaddress=findAddressById($addressid);
$rs=array("statusCode"=>"1","Msg"=>"新建收货地址成功","newaddress"=>array("addressid"=>$newaddress['addressid'],"urealname"=>$newaddress['urealname'],"utel"=>$newaddress['utel'],"realaddress"=>$newaddress['Realaddress'],"defaultaddress"=>$newaddress['defaultaddress']));
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>