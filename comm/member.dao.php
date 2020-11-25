<?PHP
require_once 'common.php';
/*---------membercase.dao------*/
function addMemberCase($uid,$identity){
	$link = get_connect();
	$sql="insert into `tbl_membercase` (`uid`,`identity`) values ($uid,$identity)";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
/*---------memberprofit.dao------*/
function findProfitByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_memberprofit where `uid`=$uid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function addMemberProfit($uid,$upgradeid){
	$link = get_connect();
	$sql="insert into `tbl_memberprofit` (`uid`,`upgradeid`,`payfeenum`)  values  ($uid,$upgradeid,1)";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateMemberProfit($uid,$payfeenum){
	$link = get_connect();
	$sql="update `tbl_memberprofit` set `payfeenum`=$payfeenum where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
/*---------qsloginprofit.dao------*/
function findProfitByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_qsloginprofit where `uid`=$uid";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>