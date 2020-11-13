<?PHP
require_once 'comm/order.dao.php';
require_once 'comm/user.dao.php';
$productid=(int)$_POST['productid'];
$orderreplyarr=findAllOrderReplyByProductid($productid);
$replylist=array();
foreach($orderreplyarr as $v){
	$uid=$v['uid'];
	$userinfo=findUserByUid($uid);
	$headimage=$userinfo['headimage'];
	$uname=$userinfo['uname'];
	$replyimage=$v['replyimage'];
	$replyimagearr=explode("\n",$replyimage);
	$replylistarr=array(array("orderreplyid"=>$v['orderreplyid'],"uname"=>$uname,"headimage"=>$headimage,"replytext"=>$v['replytext'],"replyimage"=>$replyimagearr,"replytime"=>$v['replytime'],"replyattitude"=>$v['replyattitude']));
	$replylist=array_merge_recursive($replylist,$replylistarr);
}
echo json_encode($replylist,JSON_UNESCAPED_UNICODE);
?>