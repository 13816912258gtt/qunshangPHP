<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
$shoppingcartrs=findShoppingcartByUid($uid);
$shoppingcartlist=array();
foreach($shoppingcartrs as $v){
	$shoppingcartarr=array(array("cartid"=>$v['cartid'],"productid"=>$v['productid'],"productimageurl"=>$v['productimageurl'],"productname"=>$v['productname'],"productspecid"=>$v['productspecid'],"productspecdesc"=>$v['productspecdesc'],"productnum"=>$v['productnum']));
	$shoppingcartlist=array_merge_recursive($shoppingcartlist,$shoppingcartarr);
}
echo json_encode($shoppingcartlist,JSON_UNESCAPED_UNICODE);
?>