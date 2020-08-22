<?PHP
include_once 'comm/user.dao.php';
$imgname = $_FILES['headimgFile']['name'];
$tmp = $_FILES['headimgFile']['tmp_name'];
$uid=(int)$_POST['uid'];
$filepath = '../headimg/';
if(move_uploaded_file($tmp,$filepath.$imgname)){
	updateUserHeadimage($uid,$tmp);
	$rs=array("statusCode"=>"1","Msg"=>"上传修改成功");
}else{
	$rs=array("statusCode"=>"2","Msg"=>"上传失败");
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>