<?PHP
$uid=$_GET['uid'];
require_once 'comm/video.dao.php';
require_once 'comm/product.dao.php';
$videolist=findVideosByUid($uid);
$myvideo=array();
if(!empty($videolist)){
	$i=1;
	foreach($videolist as $v){
		$myvideoarr=array("myvideolist".$i=>array("videoid"=>$v['videoid'],"url"=>$v['url'],"posterurl"=>$v['posterurl'],"videodesc"=>$v['videodesc'],"publishid"=>$v['publishid'],"publishtime"=>$v['publishtime'],"productid"=>$v['productid'],"uname"=>$v['uname'],"headimage"=>$v['headimage']));
		$myvideo=array_merge_recursive($myvideo,$myvideoarr);
		$i++;
	}
}
$myvideo=json_encode($myvideo);
$videolike=findLikeVideoByUid($uid);
$mylikevideo=array();
if(!empty($videolike)){
	$i=1;
	foreach($videolike as $v){
		$mylikevideoarr=array("mylikevideolist".$i=>array("videoid"=>$v['videoid'],"url"=>$v['url'],"posterurl"=>$v['posterurl'],"videodesc"=>$v['videodesc'],"publishid"=>$v['publishid'],"publishtime"=>$v['publishtime'],"productid"=>$v['productid'],"uname"=>$v['uname'],"headimage"=>$v['headimage']));
		$mylikevideo=array_merge_recursive($mylikevideo,$mylikevideoarr);
		$i++;
	}
}
$mylikevideo=json_encode($mylikevideo);
$product=findProductByUid($uid);
$productarr=array("productInfo"=>array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'storenum'=>$product['storenum'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'productstate'=>$product['productstate'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall']));
$productarr=json_encode($productarr);
$result=array("myvideolist"=>$myvideo,"mylikevideolist"=>$mylikevideo,"product"=>$productarr);
echo json_encode($result);
?>