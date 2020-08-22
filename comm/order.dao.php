<?PHP
require_once "common.php";
function ob2ar($obj) {
    if(is_object($obj)) {
        $obj = (array)$obj;
        $obj = ob2ar($obj);
    } elseif(is_array($obj)) {
        foreach($obj as $key => $value) {
            $obj[$key] = ob2ar($value);
        }
    }
    return $obj;
}
/*---------mainorder.dao------*/
function addMainOrder($orderstate,$uid,$addressid,$totalprice,$countprice,$finalprice){
	$link = get_connect();
	$sql="insert into `tbl_mainorder`(`orderstate`,`uid`,`addressid`,`totalprice`,`countprice`,`finalprice`)values($orderstate,$uid,$addressid,$totalprice,$countprice,$finalprice)";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	return $getId;
}
/*---------minororder.dao------*/
function addMinororder($mainorderid,$orderstate,$sellerid,$productprice,$totalprice,$countprice,$finalprice,$discuss){
	$link = get_connect();
	$sql="insert into `tbl_minororder`(`mainorderid`,`orderstate`,`sellerid`,`productprice`,`totalprice`,`countprice`,`finalprice`,`discuss`)values($mainorderid,$orderstate,$sellerid,$productprice,$totalprice,$countprice,$finalprice,$discuss)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------discount.dao------*/
function findDiscontByDiscountid($discountid){
	$link = get_connect();
	$sql="select * from `tbl_discount` where `discountid`=$discountid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
/*---------orderreply.dao------*/
function findOrderReplyByProductid($productid){
	$sql="select * from `tbl_orderreply` where `productid`=$productid order by `replytime` desc limit 3";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function findAllOrderReplyByProductid($productid){
	$sql="select * from `tbl_orderreply` where `productid`=$productid order by `replytime` desc";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
?>