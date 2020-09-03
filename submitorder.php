<?PHP
require_once "comm/order.dao.php";
require_once "comm/product.dao.php";
$infoarr=$_GET['coupon'];
$infoarr=json_decode($infoarr,true);
$infoarr=ob2ar($infoarr);
$uid=$infoarr["uid"];
$addressid=$infoarr["addressid"];
$productlist=$infoarr["productlist"];
$order=array();
foreach($productlist as $v){
	$discountid=$v["discountid"];
	$discuss=$v["discuss"];
	$productspeclist=$v['productspeclist'];
	$productid=$v['productid'];
	foreach($productspeclist as $x){
		$productoldprice=$x["productoldprice"];
		$productnum=$x["productnum"];
		$specarr=findProductSpecBySpecid($x['productspecid']);
		$storenum=$specarr["storenum"];
		if($storenum<$productnum){
			$order=array("statusCode"=>0,"Msg"=>"库存不足");
		}else{
			$storenum-=$productnum;
			updateStorenumBySpecid($specarr["productspecid"],$storenum);
			$oldprice=0;
			$countprice=0;
			$finalprice=0;
			if($discountid==0){
				$finalprice=$productnum*$productoldprice;
				$oldprice=$productnum*$productoldprice;
				$countprice=0;
			}else{
				$discountarr=findDiscontByDiscountid($discountid);
				$sillprice=$discountarr["sillprice"];
				$discountprice=$discountarr["discountprice"];
				$oldprice=$productnum*$productoldprice;
				$countprice=$oldprice/$sillprice*$discountprice;
				$finalprice=$oldprice-$finalprice;
			}
			$mainorderid=addMainOrder(0,$uid,$addressid,$oldprice,$countprice,$finalprice);
			$productarr=findProductByProductid($productid);
			$sellerid=$productarr['uid'];
			addMinororder($mainorderid,0,$sellerid,$oldprice,$oldprice,$countprice,$finalprice,$discuss);
			$orderarr=array(array("mainorderid"=>$mainorderid,"orderstate"=>0,"finalprice"=>$finalprice));
			$order=array_merge_recursive($order,$orderarr);
		}
		if($x['cartid']!=0){
			deleteCartInfo($x['cartid']);
		}
	}
}
echo json_encode($order,JSON_UNESCAPED_UNICODE);
?>