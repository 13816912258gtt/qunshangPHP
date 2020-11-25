<?PHP
require_once 'comm/common.php';
//短视频喜欢，0加0.1
function addVideoCredit($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,0,0.1)";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	return $getId;
}
//短视频取消点赞
function deleteVideoCredit($creditid){
	$link=get_connect();
	$sql="delete from `tbl_behaviorcredit` where `creditid`=$creditid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
//短视频点赞，2加0.1
function addVideoZanCredit($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,2,0.1)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
//短视频评论，3+1
function addReplyCredit($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,3,1)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
//拉新，4加100
function addMemberCredit($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,4,100)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
//浏览视频，一分钟1+0.3
function addWatchVideo($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,1,0.3)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
//兑换群币，一次6-10000
function addChangeCoin($uid){
	$link=get_connect();
	$sql="insert into `tbl_behaviorcredit`(`uid`,`behavior`,`getcredit`)values($uid,6,-10000)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findCreditById($uid,$behavior){
	$link=get_connect();
	$sql="select count(`creditid`) as num from `tbl_behaviorcredit` where `uid`=$uid and `behavior`=$behavior";
	$rs=execQuery($sql,$link);
	return $rs[0]['num'];
}
function findNewBehavior($uid){
	$link=get_connect();
	$sql="select * from `tbl_behaviorcredit` where `uid`=$uid order by `gettime` desc limit 10";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>