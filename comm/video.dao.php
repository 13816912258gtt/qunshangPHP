<?PHP
require_once 'common.php';
/*---------video.dao------*/
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
function findVideosByUid($uid){
	$sql="select * from `tbl_video` where `publishid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function findVideoByVideoid($videoid){
	$sql="select * from `tbl_video` where `videoid`=$videoid";
		$link=get_connect();
		$rs=execQuery($sql,$link);
		if(count($rs)>0){
			return $rs[0];
		}
		return $rs;
}
function findPublishidByVideoid($videoid){
	$sql="select publishid from `tbl_video` where `videoid`=$videoid";
		$link=get_connect();
		$rs=execQuery($sql,$link);
		if(count($rs)>0){
			return $rs[0];
		}
		return $rs;
}
/*---------videolike.dao------*/
function findLikeVideoByUid($uid){
	$sql="select * from `tbl_video` where `videoid` in(select `videoid` from `tbl_videolike` where `uid`=$uid)";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
/*---------videoreply.dao------*/
function findVideoReplyCount($videoid){
	$sql="select count(`replyid`) as num from `tbl_videoreply` where `videoid`=$videoid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0]['num'];
	}
	return $rs;
}
/*---------videorlike.dao------*/
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
function deleteVideoLike($videoid,$uid){
	$sql="delete from `tbl_video` where `videoid`=$videoid and `uid`=$uid";
		$link=get_connect();
		$rs=execUpdate($sql,$link);
		return $rs;
}
function addVideoLike($videoid,$uid){
	$result=findPublishidByVideoid($videoid);
	$publishid=$result['publishid'];
	$sql="insert into  `tbl_videolike` (`videoid`,`uid`,`publishid`)  values  ('$videoid','$uid','$publishid')";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
?>