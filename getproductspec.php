<?PHP
require_once 'comm/product.dao.php';
$productid=$_GET['productid'];
$speclist=array();
$specarr=findSpecByProductid($productid);
foreach($specarr as $v){
	$speclistarr=array(array("productspecid"=>$v['productspecid'],"productspecdesc"=>$v['productspecdesc'],"storenum"=>$v['storenum'],"productoldprice"=>$v['productoldprice']));
	$speclist=array_merge_recursive($speclist,$speclistarr);
}
echo json_encode($speclist,JSON_UNESCAPED_UNICODE);
?>