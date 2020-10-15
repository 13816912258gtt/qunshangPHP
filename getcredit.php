<?PHP
require_once 'comm/behaviorcredit.dao.php';
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$userarr=findUserByUid($uid);
//老板特权最高
if($uid==0000000001){
	$identity0=findBossIdentityNum(0);
	$identity1=findBossIdentityNum(1);
	$identity2=findBossIdentityNum(2);
}else if($userarr['inviteid']==0000000001){
	$identity0=findLuoIdentityNum($uid,0);
	$identity1=findLuoIdentityNum($uid,1);
	$identity2=findLuoIdentityNum($uid,2);
}
else{
    $identity0=findInviteNum($uid,0);
	$identity1=findInviteNum($uid,1);
	$identity2=findInviteNum($uid,2);
}
$invitearr=array("0"=>$identity0,"1"=>$identity1,"2"=>$identity2);
$invitenum=$invitearr[0]+$invitearr[1]+$invitearr[2];
$credit=$userarr['credit'];
$quncoin=$userarr['quncoin'];
$videolike=findCreditById($uid,0)*0.1;
$videowatch=findCreditById($uid,1)*0.3;
$videoreply=findCreditById($uid,3)*1;
$newmember=findCreditById($uid,4)*100;
$shopping=findCreditById($uid,5);
$subcredit=array("0"=>$videolike,"1"=>$videowatch,"3"=>$videoreply,"4"=>$newmember,"5"=>$shopping);
$newcredit=findNewBehavior($uid);
$behaviorlist=array();
for($i=0;$i<count($newcredit);$i++){
	$behavior=$newcredit[$i];
	$behaviorlistarr=array(array("behavior"=>$behavior['behavior'],"getcredit"=>$behavior['getcredit'],"gettime"=>$behavior['gettime']));
	$behaviorlist=array_merge_recursive($behaviorlist,$behaviorlistarr);
}
$rs=array("credit"=>$credit,"invitenum"=>$invitenum,"invitearr"=>$invitearr,"quncoin"=>$quncoin,"subcredit"=>$subcredit,"behaviorlist"=>$behaviorlist);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>