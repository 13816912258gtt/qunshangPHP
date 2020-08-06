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
	$sql="select * from `tbl_video` where `uid`=$uid";
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
function findUidByVideoid($videoid){
	$sql="select uid from `tbl_video` where `videoid`=$videoid";
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
	$sql="delete from `tbl_videolike` where `videoid`=$videoid and `uid`=$uid";
		$link=get_connect();
		$rs=execUpdate($sql,$link);
		return $rs;
}
function addVideoLike($videoid,$uid){
	$sql="insert into  `tbl_videolike` (`videoid`,`uid`)  values  ('$videoid','$uid')";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------videofocus.dao------*/
function findVideoFocus($followid,$leadid){
	$sql="select * from `tbl_videofocus` where `followid`=$followid and `leadid`=$leadid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function deleteVideoFocus($followid,$leadid){
	$sql="delete from `tbl_videofocus` where `followid`=$followid and `leadid`=$leadid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function addVideoFocus($followid,$leadid){
	$sql="insert into `tbl_videofocus`(`followid`,`leadid`)values($followid,$leadid)";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findFocusVideoByUid($uid){
	$sql="select * from `tbl_video` where `uid` in(select `leadid` from `tbl_videofocus` where `followid`=$uid) order by publishtime desc";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
?>