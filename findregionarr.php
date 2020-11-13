<?PHP
require_once 'comm/user.dao.php';
$cityparentid=(int)$_POST['parentid'];
$cityrs=findCityByParentid($cityparentid);
$citylist=array();
foreach($cityrs as $v){
	$cityarr=array(array('cityid'=>$v['cityid'],'cityparentid'=>$v['cityparentid'],'cityname'=>$v['cityname'],'citytype'=>$v['citytype']));
	$citylist=array_merge_recursive($citylist,$cityarr);
}
echo json_encode($citylist,JSON_UNESCAPED_UNICODE);
?>