<?PHP
require_once 'common.php';
function findVideoLikeCount($videoid){
	$sql="select count(`likeid`) as num from `tbl_videolike` where `videoid`=$videoid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0]['num'];
	}
	return $rs;
}
function findVideoLikeByUid($videoid,$uid){
	$sql="select * from `tbl_videolike` where `videoid`=$videoid and `uid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
?>