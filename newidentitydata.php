<?PHP
require_once 'comm/user.dao.php';
$newidentityarr=findNewIdentityData();
$userarr=array();
foreach($newidentityarr as $v){
	$userlist=array(array('headimage'=>$v['headimage'],'uname'=>$v['uname'],'identity'=>$v['identity'],'regtime'=>$v['regtime']));
	$userarr=array_merge_recursive($userarr,$userlist);
}
echo json_encode($userarr,JSON_UNESCAPED_UNICODE);
?>