<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
$product=findProductByUid($uid);
$introduceimage=$product['introduceimage'];
$introducearr=explode("\n",$introduceimage);
$productimage=$product['productimage'];
$productimagearr=explode("\n",$productimage);
$arr=array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productimage'=>$productimagearr,'introduceimage'=>$introducearr,'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'sellerid'=>$product['sellerid'],'productstate'=>$product['productstate'],'replynum'=>$product['replynum'],'sellnum'=>$product['sellnum'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall']);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>