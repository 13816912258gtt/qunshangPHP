<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/member.dao.php';
require_once 'comm/order.dao.php';
require_once 'comm/define.php';
$orderitemid=(int)$_POST['orderitemid'];
$uid=(int)$_POST['uid'];
//修改用户和邀请表，已是会员无需修改，不是会员从粉丝升级为会员，同时修改邀请表相关字段。
$userarr=findUserByUid($uid);
$identity=$userarr['identity'];
if($identity==0){
	updateIdentityToMember($uid);
	updateInvitedIdentity($uid,1);
	updateInviterIdentity($uid,1);
}
//插入会员情况表，或已经在表内不做操作
if(!findMemberCaseById($uid)){
	$caseid=addMemberCase($uid,0);
}
//插入会员费收益表
$itemarr=findOrderItemByItemid($orderitemid);
$payfeenum=itemarr['productnum'];
$upgradeid=findPrePartner($uid);
//查找用户情况表，获得原先的缴费次数
$casearr=findMemberCaseById($uid);
$paytime=$casearr['paytime'];
$sum=0;
for($i=$paytime;$i<($payfeenum+$paytime);$i++){
	$sum+=$PARTNERMF[$i]*MEMBERFEE;
}
addVipProfit($uid,$upgradeid,$payfeenum,$orderitemid,$sum);
//更新会员情况表的缴费次数和过期时间，如果是会员，过期时间直接加缴费次数年；如果不是会员，在现在时间上加缴费次数
$paytime+=$payfeenum;
if($identity==0){
	$overduetime=date('Y-m-d H:i:s', strtotime("+".$payfeenum." year"));
}else{
	$oldduetime=$casearr['overduetime'];
	$overduetime=date('Y-m-d H:i:s', strtotime("+".$payfeenum." year",strtotime($oldduetime)));
}
updateMemberPaytime($uid,$paytime);
updateMemberDuetime($uid,$overduetime);
?>