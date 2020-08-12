<?PHP
require_once 'common.php';
function test_input($data) {
   $data = trim($data); //去除左右两端的空白字符
   $data = stripslashes($data); //去除输入中的反斜杠
   $data = htmlspecialchars($data); //将特殊字符转换为实体引用
   return $data;
}
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
function findVideoByKey($keyword){
	$sql = "select * from `tbl_video` where `videodesc` like '%$keyword%' order by `publishtime` desc"; 
	$link=get_connect();
	$rs=execQuery($sql,$link);
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
function addVideoReply($videoid,$replycontent,$uid,$headimage,$uname){
	$sql="insert into  `tbl_videoreply` (`videoid`,`replycontent`,`uid`,`headimage`,`uname`)  values  ($videoid,'$replycontent',$uid,'$headimage','$uname')";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findVideoReplyById($replyid){
	$sql="select * from `tbl_videoreply` where `replyid`=$replyid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findHotVideoReplyById($videoid){
	$sql="select * from `tbl_videoreply` where `videoid`=$videoid order by `likenum` desc limit 3";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function findNewVideoReplyById($videoid){
	$sql="select * from `tbl_videoreply` where `videoid`=$videoid order by `replytime` desc";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateReplyLikenum($replyid,$likenum){
	$sql="update `tbl_videoreply` set `likenum`=$likenum where `replyid`=$replyid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
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