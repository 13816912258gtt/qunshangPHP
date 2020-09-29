<?PHP
$uid=$_GET['uid'];
require_once 'comm/video.dao.php';
require_once 'comm/product.dao.php';
$videolist=findVideosByUid($uid);
echo "2";
$myvideo=array();
if(!empty($videolist)){
	$i=1;
	foreach($videolist as $v){
		$videoid=$v['videoid'];
		$likecount=findVideoLikeCount($videoid);
		echo "3";
		$myvideoarr=array(array('videoid'=>$videoid,'url'=>$v['url'],'posterurl'=>$v['posterurl'],'videodesc'=>$v['videodesc'],'uid'=>$v['uid'],'uname'=>$v['uname'],'headimage'=>$v['headimage'],'productid'=>$v['productid'],'publishtime'=>$v['publishtime'],'likecount'=>$likecount));
		$myvideo=array_merge_recursive($myvideo,$myvideoarr);
		$i++;
	}
}
$videolike=findLikeVideoByUid($uid);
echo "4";
$mylikevideo=array();
if(!empty($videolike)){
	$i=1;
	foreach($videolike as $v){
		$videoid=$v['videoid'];
		$likecount=findVideoLikeCount($videoid);
		echo "5";
		$mylikevideoarr=array(array('videoid'=>$videoid,'url'=>$v['url'],'posterurl'=>$v['posterurl'],'videodesc'=>$v['videodesc'],'uid'=>$v['uid'],'uname'=>$v['uname'],'headimage'=>$v['headimage'],'productid'=>$v['productid'],'publishtime'=>$v['publishtime'],'likecount'=>$likecount));
		$mylikevideo=array_merge_recursive($mylikevideo,$mylikevideoarr);
		$i++;
	}
}

$product=findProductByUid($uid);
echo "6";
$productarr=array(array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'sellerid'=>$product['sellerid'],'productstate'=>$product['productstate'],'replynum'=>$product['replynum'],'sellnum'=>$product['sellnum'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall']));
$result=array("myvideolist"=>$myvideo,"mylikevideolist"=>$mylikevideo,"product"=>$productarr);
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>