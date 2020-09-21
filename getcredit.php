<?PHP
require_once 'comm/behaviorcredit.dao.php';
require_once 'comm/user.dao.php';
$uid=(int)$_POST['uid'];
$userarr=findUserByUid($uid);
$invitenum=$userarr['invitenum'];
$identity0=findInviteNum($uid,0);
$identity1=findInviteNum($uid,1);
$identity2=findInviteNum($uid,2);
$invitearr=array("0"=>$identity0,"1"=>$identity1,"2"=>$identity2);
$credit=$userarr['credit'];
$videolike=findCreditById($uid,0);
$videowatch=findCreditById($uid,1);
$videoreply=findCreditById($uid,3);
$newmember=findCreditById($uid,4);
$shopping=findCreditById($uid,5);
$subcredit=array("0"=>$videolike,"1"=>$videowatch,"3"=>$videoreply,"4"=>$newmember,"5"=>$shopping);
$newcredit=findNewBehavior($uid);
$behaviorlist=array();
for($i=0;$i<count($newcredit);$i++){
	$behavior=$newcredit[$i];
	$behaviorlistarr=array(array("behavior"=>$behavior['behavior'],"getcredit"=>$behavior['getcredit'],"gettime"=>$behavior['gettime']));
	$behaviorlist=array_merge_recursive($behaviorlist,$behaviorlistarr);
}
$rs=array("credit"=>$credit,"invitenum"=>$invitenum,"invitearr"=>$invitearr,"subcredit"=>$subcredit,"behaviorlist"=>$behaviorlist);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>