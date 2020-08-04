<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
$product=findProductByUid($uid);
$arr=array('productid'=>$product['productid'],'productname'=>$product['productname'],'productcover'=>$product['productcover'],'productimage'=>$product['productimage'],'introduceimage'=>$product['introduceimage'],'productoldprice'=>$product['productoldprice'],'productnewprice'=>$product['productnewprice'],'productdesc'=>$product['productdesc'],'commissionrate'=>$product['commissionrate'],'sellerid'=>$product['sellerid'],'productstate'=>$product['productstate'],'replynum'=>$product['replynum'],'sellnum'=>$product['sellnum'],'classchildid'=>$product['classchildid'],'shoppingmall'=>$product['shoppingmall']);
echo json_encode($arr);
?>