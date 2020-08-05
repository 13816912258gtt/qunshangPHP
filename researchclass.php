<?PHP
require_once 'comm/product.dao.php';
$classrs=findParentClass();
$productclass=array();
foreach($classrs as $v){
	$productclassid=$v['productclassid'];
	$classchildrs=findChildCLassByClassid($productclassid);
	$childclass=array();
	foreach($classchildrs as $x){
		$childclassarr=array(array("classchildid"=>$x['classchildid'],"classchildname"=>$x['classchildname'],"classchildimage"=>$x['classchildimage']));
		$childclass=array_merge_recursive($childclass,$childclassarr);
	}
	$productclassarr=array(array("productclassid"=>$productclassid,"classname"=>$v['classname'],"classimage"=>$v['classimage'],"childclass"=>$childclass));
	$productclass=array_merge_recursive($productclass,$productclassarr);
}
echo json_encode($productclass, JSON_UNESCAPED_UNICODE);
?>