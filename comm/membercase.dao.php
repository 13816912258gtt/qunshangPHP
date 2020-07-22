<?PHP
require_once 'common.php';
function addMemberCase($uid,$identity){
	$link = get_connect();
	$sql="insert into `tbl_membercase` (`uid`,`identity`) values ($uid,$identity)";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
?>