<?PHP
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$userarr=findUserByUid($uid);
$defaultid=$userarr['addressid'];
$addressarr=findAddressById($defaultid);
$rs=array("urealname"=>$addressarr['urealname'],"utel"=>$addressarr['utel'],"realaddress"=>$addressarr['Realaddress']);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);

?>