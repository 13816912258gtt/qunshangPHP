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
	$getId=mysql_insert_id($link);
	return $getId;
}
function findVideoReplyById($replyid){
	$sql="select * from `tbl_videoreply` where `replyid`=$replyid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
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
function findReplyByUid($uid){
	$sql="select * from `tbl_videoreply` where `uid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function updateReplyHeadimg($uid,$headimage){
	$sql="update `tbl_videoreply` set `headimage`='$headimage' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------videolike.dao------*/
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
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findVideoLikeById($likeid){
	$sql="select * from `tbl_videolike` where `likeid`=$likeid";
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
	$sql="insert into  `tbl_videolike` (`videoid`,`uid`)values($videoid,$uid)";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateVideoCredit($videoid,$creditid){
	$sql="update `tbl_videolike` set `creditid`=$creditid where `videoid`=$videoid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------videozan.dao------*/
function findVideoZan($uid,$videoid){
	$sql="select * from `tbl_videozan` where `videoid`=$videoid and `uid`=$uid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function addVideoZan($uid,$videoid){
	$sql="insert into  `tbl_videozan`(`videoid`,`uid`)values($videoid,$uid)";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findVideoZanCount($videoid){
	$sql="select `zancount` from `tbl_video` where `videoid`=$videoid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0]['zancount'];
	}
	return $rs;
}
function updateVideoZanCount($videoid,$zancount){
	$sql="update `tbl_video` set `zancount`=$zancount where `videoid`=$videoid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findVideoZanById($uid,$videoid){
	$sql="select * from `tbl_videozan` where `uid`=$uid and `videoid`=$videoid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
/*---------videofocus.dao------*/
function findVideoFocus($followid,$leadid){
    // echo "主：".$leadid."从：".$followid;
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
function findFocusList($followid){
	$sql="select `leadid` from `tbl_videofocus` where `followid`=$followid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
	
}
function updateHeadimg($uid,$headimage){
	$sql="update `tbl_video` set `headimage`='$headimage' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateReplyHead($uid,$headimage){
	$sql="update `tbl_videoreply` set `headimage`='$headimage' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateVideoUname($uid,$uname){
	$sql="update `tbl_video` set `uname`='$uname' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateVideoReplyUname($uid,$uname){
	$sql="update `tbl_videoreply` set `uname`='$uname' where `uid`=$uid";
	$link=get_connect();
	$rs=execUpdate($sql,$link);
	return $rs;
}
?>