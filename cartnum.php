<?PHP
include_once 'comm/product.dao.php';
$cartid=$_POST['cartid'];
$number=$_POST['number'];
$cartarr=findCartByCartid($cartid);
$info=array();
if(checkProductNum($cartarr['productspecid'],$number)){
	if($number==0){
		deleteCartInfo($cartid);
		$info=array("statusCode"=>"2");
	}else{
		updateCartNum($cartid,$number);
		$info=array("statusCode"=>"1");
	}
}else{
	$info=array("statusCode"=>"0");
}
echo json_encode($info,JSON_UNESCAPED_UNICODE);
?>