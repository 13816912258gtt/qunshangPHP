<?php

/**用户信息操作文件**/
require_once 'common.php';

function addUser($utel,$preidentity,$inviteid){
	$link = get_connect();
	$utel=mysql_dataCheck($utel);
	$uname = substr($utel,(strlen($utel)-3)); 
	$uname="用户_".$uname;
	$gender=1;
	$headimage="//hbimg.huabanimg.com/6d28cfdb0f69acaa5c21651ebfb924a5b796dee646f30-JP2KuL_fw658/format/webp";
	$sql="insert into `tbl_user` (`utel`,`uname`,`headimage`,`gender`,`preidentity`,`identity`,`inviteid`)  values  ('$utel','$uname','$headimage',$gender,'$preidentity',0,$inviteid)";
	$rs=execUpdate($sql,$link);
	$getId=mysql_insert_id($link);
	mysql_close($link);
	return $getId;
}
function updateInviteNum($uid,$invitenum){
	$link=get_connect();
	$sql="update `tbl_user` set `invitenum`=$invitenum where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findUserByInvited($invitecode){
	$link=get_connect();
	$sql="select `uid` from `tbl_user` where `invitecode`='$invitecode'";
	$rs=execQuery($sql,$link);
	return $rs[0]['uid'];
}
/*
function getId(){
	$link=get_connect();
	$getId=mysql_insert_id($link);
	return $getId;
}
*/
function createInviteCode($userId)
{
    $sourceString = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $num = $userId;
    $code = '';
    while($num)
    {
        $mod = $num % 36;
        $num = (int)($num / 36);
        $code = "{$sourceString[$mod]}{$code}";
    }
    //判断code的长度
    if( empty($code[4]))
        str_pad($code,5,"0",STR_PAD_LEFT);
    return $code;
}
function updateInviteCode($invitecode,$userId){
	$link=get_connect();
	$sql="update `tbl_user` set `invitecode`='$invitecode' where `uid`=$userId";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
//输入过滤
function test_input($data) {
   $data = trim($data); //去除左右两端的空白字符
   $data = stripslashes($data); //去除输入中的反斜杠
   $data = htmlspecialchars($data); //将特殊字符转换为实体引用
   return $data;
}
function findUserByPhone($utel){
	$link = get_connect();
	$sql="select * from tbl_user where `utel`='$utel'";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findUserByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_user where `uid`=$uid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findUnameByUid($uid){
	$link = get_connect();
	$sql="select * from tbl_user where `uid`=$uid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	return $rs[0]["uname"];
}
function updateIdentityToMember($uid){
	$link = get_connect();
	$sql="update `tbl_user` set `identity`=2 where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function findIdentityById($uid){
	$link = get_connect();
	$sql="select * from tbl_user where `uid`=$uid";
	$rs=execQuery($sql,$link);
	mysql_close($link);
	if(count($rs)>0){
		$result=$rs[0]['identity'];
		return $result;
	}
}
function findPreinviteid($uid){
	$rs=findUserByUid($uid);
	$inviteid=$rs['inviteid'];
	return $inviteid;
}
function updateUserCredit($uid,$credit){
	$link = get_connect();
	$sql="update `tbl_user` set `credit`=$credit where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateUserCoin($uid,$quncoin){
	$link = get_connect();
	$sql="update `tbl_user` set `quncoin`=$quncoin where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateUname($uid,$uname){
	$link = get_connect();
	$sql="update `tbl_user` set `uname`='$uname' where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateUserHeadimage($uid,$headimage){
	$link = get_connect();
	$sql="update `tbl_user` set `headimage`='$headimage' where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateUserIntroduce($uid,$introduce){
	$link = get_connect();
	$sql="update `tbl_user` set `introduce`='$introduce' where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function updateUserGender($uid,$gender){
	$link = get_connect();
	$sql="update `tbl_user` set `gender`=$gender where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function addInviteInfo($invitedid,$invitedidentity,$inviterid,$inviteridentity){
	$link=get_connect();
	$sql="insert into `tbl_invite`(`invitedid`,`invitedidentity`,`inviterid`,`inviteridentity`)values($invitedid,$invitedidentity,$inviterid,$inviteridentity)";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function updateDefaultAddress($uid,$addressid){
	$link = get_connect();
	$sql="update `tbl_user` set `addressid`='$addressid' where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	mysql_close($link);
	return $rs;
}
function findAddressById($addressid){
	$link=get_connect();
	$sql="select * from `tbl_shippingaddress` where `addressid`=$addressid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		$result=$rs[0];
		return $result;
	}
	return $rs;
}
function updatePartnerid($uid,$partnerid){
	$link=get_connect();
	$sql="update `tbl_user` set `partnerid`=$partnerid where `uid`=$uid";
	$rs=execUpdate($sql,$link);
	return $rs;
}
function findInviteNum($inviterid,$invitedidentity){
	$link=get_connect();
	$sql="select count(*) as num from `tbl_invite` where `inviterid`=$inviterid and `invitedidentity`=$invitedidentity";
	$rs=execQuery($sql,$link);
	return $rs[0]['num'];
}
function findBossIdentityNum($identity){
	$link=get_connect();
	$sql="select count(*) as num from `tbl_user` where `identity`=$identity";
	$rs=execQuery($sql,$link);
	return $rs[0]['num'];
}
function findLuoIdentityNum($partnerid,$identity){
	$link=get_connect();
	$sql="select count(*) as num from `tbl_user` where `partnerid`=$partnerid and `identity`=$identity";
	$rs=execQuery($sql,$link);
	return $rs[0]['num'];
}
function findRealById($uid){
	$link=get_connect();
	$sql="select * from `tbl_realname` where `uid`=$uid";
	$rs=execQuery($sql,$link);
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}
function findCityByParentid($cityparentid){
	$sql="select * from `tbl_pcity` where `cityparentid`=$cityparentid";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
function findNewIdentityData(){
	$sql="select * from `tbl_user` where `identity`=0 order by regtime desc limit 0,3";
	$link=get_connect();
	$rs=execQuery($sql,$link);
	return $rs;
}
?>