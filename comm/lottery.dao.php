<?PHP
require_once 'common.php';

function addLottery($uid,$number,$period){
	$link=get_connect();
	$sql="insert into `tbl_lottery`(`uid`,`number`,`period`,`drawtime`)values($uid,'$number',$period,'2020-10-18 18:00:00')";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function getLastNum($period){
	$link=get_connect();
	$sql="select `number` from `tbl_lottery` where `period`=$period order by `lotteryid` desc";
	$rs=execQuery($sql,$link);
	return $rs;
}
function getLastId($period){
	$link=get_connect();
	$sql="select `lotteryid` from `tbl_lottery` where `period`=$period order by `lotteryid` desc";
	$rs=execQuery($sql,$link);
	return $rs[0]['lotteryid'];
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
function findLotteryById($lotteryid){
	$link=get_connect();
	$sql="select * from `tbl_lottery` where `lotteryid`=$lotteryid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function addDrawLottery($number,$uid,$realname,$realidentity,$level,$utel,$period){
	$sql="insert into `tbl_drawlottery`(`number`,`uid`,`realname`,`realidentity`,`level`,`utel`,`period`)values('$number',$uid,'$realname','$realidentity',$level,'$utel',$period)";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findResult($period){
	$link=get_connect();
	$sql="select * from `tbl_drawlottery` where `period`=$period";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>