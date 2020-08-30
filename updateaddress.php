<?PHP
$addressid=(int)$_POST['addressid'];
$urealname=$_POST['urealname'];
$utel=$_POST['utel'];
$realaddress=$_POST['realaddress'];
$defaultaddress=(int)$_POST['defaultaddress'];
require_once 'comm/order.dao.php';
require_once 'comm/user.dao.php';
updateAddress($addressid,$defaultaddress,$urealname,$utel,$realaddress);
if($defaultaddress==1){
	updateDefaultAddress($uid,$realaddress);
}
$newaddress=findAddressById($addressid);
$rs=array("statusCode"=>"1","Msg"=>"修改收货地址成功","newaddress"=>array("addressid"=>$newaddress['addressid'],"urealname"=>$newaddress['urealname'],"utel"=>$newaddress['utel'],"realaddress"=>$newaddress['Realaddress'],"defaultaddress"=>$newaddress['defaultaddress']));
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>