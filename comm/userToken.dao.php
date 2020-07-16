<?php

/**用户信息操作文件**/
require_once 'common.php';

function updateLoginStatus($token){
	$link=get_connect();
	$sql="update `tbl_userToken` set `loginStatus`=1 where `token`=$token";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateLoginUid($uid,$token){
	$link=get_connect();
	$sql="update `tbl_userToken` set `uid`=$uid where `token`=$token";
	$rs=execUpdate($sql,$link);
	return $rs;
}
?>