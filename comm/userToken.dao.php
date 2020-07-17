<?php

/**用户信息操作文件**/
require_once 'common.php';

function updateLoginStatus($token,$uid){
	$link=get_connect();
	$sql="update `tbl_userToken` set `loginStatus`=1 , `uid`=$uid where `token`=$token";
	$rs=execUpdate($sql,$link);
	return $rs;
}

?>