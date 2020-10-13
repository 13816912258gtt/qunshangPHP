<?PHP
require_once 'common.php';
function findLiveByLiverid($liverid){
	$sql="select * from `tbl_liveroom` where `liverid`=$liverid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateLiveHead($liverid,$headimage){
	$sql="update `tbl_liveroom` set `headimage`='$headimage' where `liverid`=$liverid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findAudienceByLiverid($uid){
	$sql="select * from `tbl_liveaudience` where `uid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateAudienceHead($uid,$headimage){
	$sql="update `tbl_liveaudience` set `headimage`='$headimage' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findAGiftByUid($uid){
	$sql="select * from `tbl_givegift` where `uid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateAGiftHead($uid,$headimage){
	$sql="update `tbl_givegift` set `headimage`='$headimage' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findLGiftByLiverid($liverid){
	$sql="select * from `tbl_givegift` where `liverid`=$liverid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateLGiftHead($liverid,$liverheadimage){
	$sql="update `tbl_givegift` set `liverheadimage`='$liverheadimage' where `liverid`=$liverid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
?>