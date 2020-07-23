<?PHP
require_once 'common.php';
function findVideoCount(){
	$sql="select count(`videoid`) as num from `tbl_video`";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findVideos(){
	$sql="select * from `tbl_video`";
		$link=get_connect();
		$rs=execQuery($sql,$link);
		return $rs;
}
?>