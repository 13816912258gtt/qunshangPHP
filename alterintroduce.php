<?PHP
$uid=(int)$_POST['uid'];
$introduce=$_POST['introduce'];
if(updateUserIntroduce($uid,$introduce)){
	$rs=array("statusCode"=>"1","Msg"=>"修改成功");
}else{
	$rs=array("statusCode"=>"2","Msg"=>"修改失败");
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>