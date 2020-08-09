<?PHP
require_once 'common.php';
function findProductByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_product where `sellerid`=$uid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findProductByProductid($productid){
	$link = get_connect();
	$sql="select * from tbl_product where `productid`=$productid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
/*---------productspec.dao------*/
function findProductSpecBySpecid($productspecid){
	$link = get_connect();
	$sql="select * from tbl_productspec where `productspecid`=$productspecid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findSpecByProductid($productid){
	$link = get_connect();
	$sql="select * from tbl_productspec where `productid`=$productid";
	$rs=execQuery($sql,$link);
	return $rs;
}
function findSpecByCartid($cartid){
	$link = get_connect();
	$sql="select * from `tbl_productspec` where `productspecid` in (select `productspecid` from `tbl_shoppingcart` where `cartid`=$cartid)";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function updateStorenumBySpecid($productspecid,$storenum){
	$link = get_connect();
	$sql="update `tbl_productspec` set `storenum`=$storenum where `productspecid`=$productspecid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------shoppingcart.dao------*/
function addShoppingCart($uid,$productid,$productimageurl,$productname,$productspecid,$productspecdesc,$productnum){
	$link=get_connect();
	$sql="insert into `tbl_shoppingcart`(`uid`,`productid`,`productimageurl`,`productname`,`productspecid`,`productspecdesc`,`productnum`)values($uid,$productid,'$productimageurl','$productname',$productspecid,'$productspecdesc',$productnum)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findShoppingcartByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_shoppingcart where `uid`=$uid group by `productid` order by `cartid` desc";
	$rs=execQuery($sql,$link);
	return $rs;
}
function findShoppingcart($uid,$productspecid){
	$link = get_connect();
	$sql="select * from tbl_shoppingcart where `productspecid`=$productspecid and `uid`=$uid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findCartByCartid($cartid){
	$link = get_connect();
	$sql="select * from tbl_shoppingcart where `cartid`=$cartid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findSelleridByCartid($cartid){
	$link = get_connect();
	$sql="select sellerid from `tbl_product` where `productid` in (select `productid` from `tbl_shoppingcart` where `cartid`=$cartid)";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0]["sellerid"];
	}
	return $rs;
}
function findSpecByUP($uid,$productid){
	$link = get_connect();
	$sql="select * from `tbl_shoppingcart` where `productid`=$productid and `uid`=$uid";
	$rs=execQuery($sql,$link);
	return $rs;
}
function findPriceBySpecid($productspecid){
	$link = get_connect();
	$sql="select * from `tbl_productspec` where `productspecid`=$productspecid";
	$rs=execQuery($sql,$link);
	return $rs[0]["productoldprice"];
}
function updateShoppingcart($uid,$productspecid,$productnum){
	$link = get_connect();
	$sql="update `tbl_shoppingcart` set `productnum`=$productnum where `uid`=$uid and `productspecid`=$productspecid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
/*---------productclass.dao------*/
function findParentCLass(){
	$link = get_connect();
	$sql="select * from tbl_productclass";
	$rs=execQuery($sql,$link);
	return $rs;
}
/*---------productclasschild.dao------*/
function findChildCLassByClassid($classid){
	$link = get_connect();
	$sql="select * from tbl_productclasschild where `productclassid`=$classid";
	$rs=execQuery($sql,$link);
	return $rs;
}
?>