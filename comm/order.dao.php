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
/*---------shippingaddress.dao------*/
function addShippingAddress($uid,$defaultaddress,$urealname,$utel,$realaddress){
	$link = get_connect();
	$sql="insert into `tbl_shippingaddress`(`uid`,`defaultaddress`,`urealname`,`utel`,`Realaddress`)values($uid,$defaultaddress,'$urealname','$utel','$realaddress')";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	return $getId;
}
function updateAddress($addressid,$defaultaddress,$urealname,$utel,$realaddress){
	$link = get_connect();
	$sql="update `tbl_shippingaddress` set `defaultaddress`=$defaultaddress,`urealname`='$urealname',`utel`='$utel',`Realaddress`='$realaddress' where `addressid`=$addressid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findDefaultAddressList($uid){
	$sql="select * from `tbl_shippingaddress` where `uid`=$uid and `defaultaddress`=1";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findOtherAddressList($uid){
	$sql="select * from `tbl_shippingaddress` where `uid`=$uid and `defaultaddress`=0";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function findAddressById($addressid){
	$sql="select * from `tbl_shippingaddress` where `addressid`=$addressid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
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
function addMinororder($orderstate,$sellerid,$uid,$productprice,$totalprice,$countprice,$finalprice,$discuss,$discountid){
	$link = get_connect();
	$sql="insert into `tbl_minororder`(`orderstate`,`sellerid`,`uid`,`productprice`,`freight`,`totalprice`,`countprice`,`finalprice`,`discuss`,`discountid`)values($orderstate,$sellerid,$uid,$productprice,0,$totalprice,$countprice,$finalprice,'$discuss','$discountid')";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	return $getId;
}
function updateMainid($mainorderid,$minororderid){
	$link = get_connect();
	$sql="update `tbl_minororder` set `mainorderid`=$mainorderid where `minororderid`=$minororderid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------orderitem.dao------*/
function addOrderItem($productname,$productimage,$productid,$productintroduce,$preprice,$productnum,$commissionrate){
	$link = get_connect();
	$sql="insert into `tbl_orderitem`(`productname`,`productimage`,`productid`,`productintroduce`,`preprice`,`productname`,`commissionrate`)values('$productname','$productimage',$productid,'$productintroduce',$preprice,$productnum,$commissionrate)";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	return $getId;
}
function updateMinorid($minororderid,$oderitemid){
	$link = get_connect();
	$sql="update `tbl_orderitem` set `minororderid`=$minororderid where `orderitemid`=$orderitemid";
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