<?PHP
require_once 'comm/common.php';

date_default_timezone_set('Asia/Shanghai');//时区设置
$userarr=findAllLottery();
foreach($userarr as $v){
	$nowtime="2020-10-18 18:00:00";
	updateTime($v['uid'],$nowtime);
}


function updateTime($uid,$time){
	$link=get_connect();
	$sql="update `tbl_lottery` set `drawtime`='$time' where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findAllLottery(){
	$link=get_connect();
	$sql="select * from `tbl_lottery`";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>