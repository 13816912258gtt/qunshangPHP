<?PHP
$followid=(int)$_POST['uid'];
$leadid=(int)$_POST['leadid'];
require_once 'comm/video.dao.php';
$isfocus=false;
if(findVideoFocus($followid,$leadid)){
	deleteVideoFocus($followid,$leadid);
	$isfocus=false;
}else{
	addVideofocus($followid,$leadid);
	$isfocus=true;
}
$arr=array("isfocus"=>$isfocus);
echo json_encode($arr);
?>