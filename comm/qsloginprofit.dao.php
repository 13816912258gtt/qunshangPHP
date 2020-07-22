<?PHP
require_once 'common.php';
function findProfitByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_qsloginprofit where `uid`=$uid";
	$rs=execQuery($sql,$link);
	return $rs;
}

?>