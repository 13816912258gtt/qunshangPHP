<?PHP
require_once 'comm/product.dao.php';
$classrs=findParentClass();
foreach($classrs as $v){
	$productclassid=$v['productclassid'];
	$classchildrs=findChildCLassByClassid($productclassid);
	foreach($classchildrs as $x){
		
	}
}
?>