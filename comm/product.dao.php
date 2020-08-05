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
/*---------shoppingcart.dao------*/
function addShoppingCart($uid,$productid,$productimageurl,$productname,$productspecid,$productspecdesc,$productnum){
	$link=get_connect();
	$sql="insert into `tbl_shoppingcart`(`uid`,`productid`,`productimageurl`,`productname`,`productspecid`,`productspecdesc`,`productnum`)values($uid,$productid,'$productimageurl','$productname',$productspecid,'$productspecdesc',$productnum)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findShoppingcartByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_shoppingcart where `uid`=$uid";
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