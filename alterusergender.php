<?PHP
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$gender=(int)$_POST['gender'];
if(updateUserGender($uid,$gender)){
	$rs=array("statusCode"=>"1","Msg"=>"修改成功");
}else{
	$rs=array("statusCode"=>"2","Msg"=>"修改失败");
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>