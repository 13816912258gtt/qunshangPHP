<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
$product=findProductByUid($uid);
$arr=array("productInfo"=>array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'storenum'=>$product['storenum'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'productstate'=>$product['productstate'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall']));
echo json_encode($arr);
?>