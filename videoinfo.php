<?PHP
$uid=(int)$_POST['uid'];
$videoid=(int)$_POST['videoid'];
require_once 'comm/video.dao.php';
$videoinfoarr=findVideoByVideoid($videoid);
$islike=false;
if(findVideoLikeByUid($videoid,$uid)){
	$islike=true;
}
$videoinfo=array("videoid"=>$videoinfoarr['videoid'],"url"=>$videoinfoarr['url'],"posterurl"=>$videoinfoarr['posterurl'],"videodesc"=>$videoinfoarr['videodesc'],"uid"=>$videoinfoarr['uid'],"uname"=>$videoinfoarr['uname'],"headimage"=>$videoinfoarr['headimage'],"productid"=>$videoinfoarr['productid'],"publishtime"=>$videoinfoarr['publishtime']);
$rs=array("islike"=>$islike,"videoInfo"=>$videoinfo);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>