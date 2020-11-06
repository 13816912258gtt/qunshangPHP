<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/video.dao.php';
$uid=(int)$_POST['uid'];
$focusarr=findFocusList($uid);
$focuslist=array();
foreach($focusarr as $v){
	$leadid=$v['leadid'];
	$userarr=findUserByUid($leadid);
	$focuslistarr=array(array('uid'=>$userarr['uid'],'uname'=>$userarr['uname'],'headimage'=>$userarr['headimage'],"introduce"=>$userarr['introduce']));
	$focuslist=array_merge_recursive($focuslist,$focuslistarr);
}
echo json_encode($focuslist,JSON_UNESCAPED_UNICODE);
?>