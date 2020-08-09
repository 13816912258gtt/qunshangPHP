<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
$shoppingcartrs=findShoppingcartByUid($uid);
$shoppingcartlist=array();
foreach($shoppingcartrs as $v){
	$productid=$v["productid"];
	$speclist=array();
	$specarr=findSpecByUP($uid,$productid);
	foreach($specarr as $x){
		$speclistarr=array(array("cartid"=>$x['cartid'],"productspecid"=>$x['productspecid'],"productspecdesc"=>$x['productspecdesc'],"productnum"=>$v['productnum']));
		$speclist=array_merge_recursive($speclist,$speclistarr);
	}
	$sellerid=findSelleridByCartid($v['cartid']);
	$shoppingcartarr=array(array("sellerid"=>$sellerid,"productid"=>$v['productid'],"productimageurl"=>$v['productimageurl'],"productname"=>$v['productname'],"productspeclist"=>$speclist));
	$shoppingcartlist=array_merge_recursive($shoppingcartlist,$shoppingcartarr);
}
echo json_encode($shoppingcartlist,JSON_UNESCAPED_UNICODE);
?>