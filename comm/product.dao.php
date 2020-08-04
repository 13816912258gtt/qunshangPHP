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