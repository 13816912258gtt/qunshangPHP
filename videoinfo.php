<?PHP
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
require_once 'comm/video.dao.php';
$videoinfoarr=findVideoByVideoid($videoid);
$islike=false;
if(findVideoLikeByUid($videoid,$uid)){
	$islike=true;
}
$likecount=findVideoLikeCount($videoid);
$replycount=findVideoReplyCount($videoid);
$isfocus=false;
if(findVideoFocus($uid,$videoinfoarr['uid'])){
	$isfocus=true;
}
$iszan=false;
if(findVideoZanById($uid,$videoid)){
	$iszan=true;
}
$videoinfo=array("videoid"=>$videoinfoarr['videoid'],"url"=>$videoinfoarr['url'],"posterurl"=>$videoinfoarr['posterurl'],"videodesc"=>$videoinfoarr['videodesc'],"uid"=>$videoinfoarr['uid'],"uname"=>$videoinfoarr['uname'],"headimage"=>$videoinfoarr['headimage'],"productid"=>$videoinfoarr['productid'],"publishtime"=>$videoinfoarr['publishtime'],"islike"=>$islike,'isfocus'=>$isfocus,'likecount'=>$likecount,'replycount'=>$replycount,'iszan'=>$iszan,'zancount'=>$videoinfoarr['zancount']);
echo json_encode($videoinfo,JSON_UNESCAPED_UNICODE);
?>