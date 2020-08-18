<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
require_once 'comm/order.dao.php';
require_once 'comm/user.dao.php';
$product=findProductByUid($uid);
$introduceimage=$product['introduceimage'];
$introducearr=explode("\n",$introduceimage);
$productimage=$product['productimage'];
$productimagearr=explode("\n",$productimage);
$orderreplyarr=findOrderReplyByProductid($product['productid']);
$replylist=array();
foreach($orderreplyarr as $v){
	$userinfo=findUserByUid($v['uid']);
	$headimage=$userinfo['headimage'];
	$uname=$userinfo['uname'];
	$replytime=$v['replytime'];
	$replytext=$v['replytext'];
	$replylistarr=array(array("headimage"=>$headimage,"uname"=>$uname,"replytime"=>$replytime,"replytext"=>$replytext));
	$replylist=array_merge_recursive($replylist,$replylistarr);
}
$arr=array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productimage'=>$productimagearr,'introduceimage'=>$introducearr,'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'sellerid'=>$product['sellerid'],'productstate'=>$product['productstate'],'replynum'=>$product['replynum'],'sellnum'=>$product['sellnum'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall'],'freight'=>$product['freight'],'productaddress'=>$product['productaddress'],"replylist"=>$replylist);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>