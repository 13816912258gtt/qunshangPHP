<?PHP
$uid=(int)$_POST['uid'];
$urealname=$_POST['urealname'];
$utel=$_POST['utel'];
$realaddress=$_POST['realaddress'];
$defaultaddress=(int)$_POST['defaultaddress'];
require_once 'comm/order.dao.php';
require_once 'comm/user.dao.php';
addShippingAddress($uid,$defaultaddress,$urealname,$utel,$realaddress);
if($defaultaddress==1){
	updateDefaultAddress($uid,$realaddress);
}
$rs=array("statusCode"=>"1","Msg"=>"新建收货地址成功");
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>