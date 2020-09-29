<?PHP
require_once 'common.php';

function addLottery($uid,$number,$period){
	$link=get_connect();
	$sql="insert into `tbl_lottery`(`uid`,`number`,`period`)values($uid,'$number',$period)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function getLastNum($period){
	$link=get_connect();
	$sql="select `number` from `tbl_lottery` where `period`=$period order by `lotteryid` desc";
	$rs=execQuery($sql,$link);
	return $rs;
}
function findUidGetNum($uid,$period){
	$link=get_connect();
	$sql="select * from `tbl_lottery` where `uid`=$uid and `period`=$period";
	$rs=execQuery($sql,$link);
	return $rs;
}
function findLottery($uid,$period){
	$link=get_connect();
	$sql="select `number` from `tbl_lottery` where `period`=$period and `uid`=$uid";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>