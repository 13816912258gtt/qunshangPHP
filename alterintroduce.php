<?PHP
$uid=(int)$_POST['uid'];
$introduce=$_POST['introduce'];
require_once 'comm/user.dao.php';
if(updateUserIntroduce($uid,$introduce)){
	$rs=array("statusCode"=>"1","introduce"=>$introduce);
}else{
	$rs=array("statusCode"=>"2","Msg"=>"修改失败");
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>