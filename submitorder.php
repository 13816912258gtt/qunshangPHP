<?PHP
require_once "comm/order.dao.php";
require_once "comm/product.dao.php";
$infoarr=$_GET['coupon'];
$infoarr=json_decode($infoarr,true);
$infoarr=ob2ar($infoarr);
$uid=$infoarr["uid"];
$addressid=$infoarr["addressid"];
$productlist=$infoarr["productlist"];
$orderMsg=array();
$maintotalprice=0;
$maincountprice=0;
$mainfinalprice=0;
$minoridarr=array();
foreach($productlist as $v){
	$discountid=$v["discountid"];
	$discuss=$v["discuss"];
	$productspeclist=$v['productspeclist'];
	$productid=$v['productid'];
	$productarr=findProductByProductid($productid);
	$commissionrate=$productarr['commissionrate'];
	$sellerid=$productarr['sellerid'];
	$sellername=$v['sellername'];
	$productimageurl=$v['productimageurl'];
	$productname=$v['productname'];
	$minortotalprice=0;
	$minorcountprice=0;
	$minorfinalprice=0;
	$itemidarr=array();
	foreach($productspeclist as $x){
		$productoldprice=$x["productoldprice"];
		$productnum=$x["productnum"];
		$productspecid=$x['productspecid'];
		$productspecdesc=$x['productspecdesc'];
		$cartid=$x['cartid'];
		$specarr=findProductSpecBySpecid($productspecid);
		$storenum=$specarr["storenum"];
		if($storenum<$productnum){
			$orderMsg=array("statusCode"=>0,"Msg"=>"库存不足");
			break 2;
		}else{
			$storenum-=$productnum;
			updateStorenumBySpecid($specarr["productspecid"],$storenum);
			$itemtotalprice=$productnum*$productoldprice;
			$itemcountprice=0;
			$itemfinalprice=0;
			if($discountid="0"){
				$minortotalprice+=$productnum*$productoldprice;
				$minorfinalprice+=$productnum*$productoldprice;
				$minorcountprice=0;
			}else{
				$discountlist=explode(",",$discountid);
				$minortotalprice+=$productnum*$productoldprice;
				$maintotalprice+=$minortotalprice;
				$minorfinalprice=$minortotalprice;
				foreach($discountlist as $z){
					$discountarr=findDiscontByDiscountid($z);
					$sillprice=$discountarr["sillprice"];
					$discountprice=$discountarr["discountprice"];
					$minorcountprice+=($productnum*$productoldprice)/$sillprice*$discountprice;
					$maincountprice+=$minorcountprice;
					$itemcountprice+=($productnum*$productoldprice)/$sillprice*$discountprice;
				}
			}
			$itemfinalprice=$itemtotalprice-$itemcountprice;
			$preprice=$itemfinalprice/$productnum;
			$itemid=addOrderItem($productname,$productimageurl,$productid,$productspecdesc,$preprice,$productnum,$commissionrate);
			array_push($itemidarr,$itemid);
		}
		
		if($cartid!=0){
			deleteCartInfo($cartid);
		}
	}
	$minorfinalprice=$minorfinalprice-$minorcountprice;
	$minorid=addMinororder(0,$sellerid,$uid,$minortotalprice,$minortotalprice,$minorcountprice,$minorfinalprice,$discuss,$discountid);
	foreach($itemidarr as $a){
		updateMinorid($minorid,$a);
	}
	array_push($minoridarr,$minorid);
}
$mainfinalprice=$maintotalprice-$maincountprice;
$mainorderid=addMainOrder(0,$uid,$addressid,$maintotalprice,$maincountprice,$mainfinalprice);
foreach($minoridarr as $b){
	updateMainid($mainorderid,$b);
}
if(count($orderMsg)==0){
	$orderMsg=array("statusCode"=>1,"Msg"=>"提交订单成功");
}
echo json_encode($orderMsg,JSON_UNESCAPED_UNICODE);
?>