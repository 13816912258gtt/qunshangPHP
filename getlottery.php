<?PHP
require_once 'comm/user.dao.php';
require_once 'comm/lottery.dao.php';

$uid=(int)$_POST['uid'];
$period=1;
$rs=array();
//查找uid有没有取过抽奖码
if($numgot=findUidGetNum($uid,$period)){
	$numarr=array();
	for($i=0;$i<count($numgot);$i++){
		$num=array($numgot[$i]['number']);
		$numarr=array_merge_recursive($numarr,$num);
	}
	$rs=array("statusCode"=>1,"number"=>$numarr);
}else{
	//查找用户身份
	$userarr=findUserByUid($uid);
	$identity=$userarr['identity'];
	$n=$identity;
	//查找最新分配出去的抽奖码，如果查找不到就说明是第一个请求抽奖的用户
	if(!getLastNum($period)){
		$number='A0000';
		for($i=0;$i<=$n && $i<3;$i++){
			addLottery($uid,$number,$period);
			$number=getBehindNum($number);
		}
	}else{
		$arr=getLastNum($period);
		$number=$arr[0]['number'];
		$number=getBehindNum($number);
		for($i=0;$i<=$n && $i<3;$i++){
			addLottery($uid,$number,$period);
			$number=getBehindNum($number);
		}
	}
	$result=findLottery($uid,$period);
	$numarr=array();
	for($i=0;$i<count($result);$i++){
		$num=array($result[$i]['number']);
		$numarr=array_merge_recursive($numarr,$num);
	}
	$rs=array("statusCode"=>0,"number"=>$numarr);
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);	

//获取该抽奖码的后一个
function getBehindNum($number){
	$str1=substr($number, 0, strlen($number)-1);
	$str2=substr($number, -1, 1)+1;
	if($str2==10000){
		$str2='0000';
		$str1=chr(ord($str1)+1);
	}
	return $str1.$str2;
}
?>