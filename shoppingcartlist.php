<?PHP
$uid=$_GET['uid'];
require_once 'comm/product.dao.php';
require_once 'comm/user.dao.php';
$shoppingcartrs=findShoppingcartByUid($uid);
$shoppingcartlist=array();
foreach($shoppingcartrs as $v){
	$productid=$v["productid"];
	$speclist=array();
	$specarr=findSpecByUP($uid,$productid);
	foreach($specarr as $x){
		$productspecid=$x['productspecid'];
		$productoldprice=findPriceBySpecid($productspecid);
		$speclistarr=array(array("cartid"=>$x['cartid'],"productspecid"=>$x['productspecid'],"productspecdesc"=>$x['productspecdesc'],"productoldprice"=>$productoldprice,"productnum"=>$x['productnum']));
		$speclist=array_merge_recursive($speclist,$speclistarr);
	}
	$sellerid=findSelleridByCartid($v['cartid']);
	$sellername=findUnameByUid($sellerid);
	$shoppingcartarr=array(array("sellername"=>$sellername,"productid"=>$v['productid'],"productimageurl"=>$v['productimageurl'],"productname"=>$v['productname'],"productspeclist"=>$speclist));
	$shoppingcartlist=array_merge_recursive($shoppingcartlist,$shoppingcartarr);
}
echo json_encode($shoppingcartlist,JSON_UNESCAPED_UNICODE);
?>