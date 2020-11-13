<?PHP
$followid=$_POST['uid'];
$leadid=$_POST['leadid'];
require_once 'comm/video.dao.php';
$isfocus=false;
if(findVideoFocus($followid,$leadid)){
	deleteVideoFocus($followid,$leadid);
	$isfocus=false;
}else{
	addVideoFocus($followid,$leadid);
	$isfocus=true;
}
$arr=array("isfocus"=>$isfocus);
echo json_encode($arr);
?>