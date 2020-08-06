<?PHP
$followid=$_GET['uid'];
$videoid=$_GET['videoid'];
require_once 'comm/video.dao.php';
$videors=findVideoByVideoid($videoid);
$leadid=$videors['uid'];
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