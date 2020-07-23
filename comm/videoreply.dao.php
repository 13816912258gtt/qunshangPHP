<?PHP
require_once 'common.php';
function findVideoReplyCount($videoid){
	$sql="select count(`replyid`) as num from `tbl_videoreply` where `videoid`=$videoid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0]['num'];
	}
	return $rs;
}
?>