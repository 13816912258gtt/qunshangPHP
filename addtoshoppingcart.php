<?PHP
$uid=(int)$_POST['uid'];
$productspecid=(int)$_POST['productspecid'];
$productnum=(int)$_POST['productnum'];
require_once 'comm/product.dao.php';
require_once 'comm/user.dao.php';
$userrs=findUserByUid($uid);
$productspecrs=findProductSpecBySpecid($productspecid);

$productid=$productspecrs['productid'];
$productrs=findProductByProductid($productid);
// var_dump($productrs);
$productimageurl=$productspecrs['specimgurl'];
$productname=$productrs['productname'];
$productspecdesc=$productspecrs['productspecdesc'];
$sellerid=$productrs['sellerid'];

$usearr=findUserByUid($sellerid);

$sellername=$usearr['uname'];
$findShoppingcart=findShoppingcart($uid,$productspecid);
if($findShoppingcart){
	$productnum=$productnum+$findShoppingcart['productnum'];
	$rs=updateShoppingcart($uid,$productspecid,$productnum);
}else{
	$rs=addShoppingCart($uid,$productid,$productimageurl,$productname,$productspecid,$productspecdesc,$productnum,$sellerid,$sellername);
}
if($rs){
	$numarr=findShoppingcart($uid,$productspecid);
	$num=$numarr['productnum'];
	$arr=array('statusCode'=>1,'Msg'=>"加入购物车成功","num"=>$num);
}else{
	$arr=array('statusCode'=>2,'errMsg'=>"加入购物车失败");
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>