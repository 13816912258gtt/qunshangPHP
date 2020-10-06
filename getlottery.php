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
/*
function getBehindNum($number){
	$str1=substr($number, 0,1);
	$str2=(int)substr($number, -4)+1;
	$str2= str_pad($str2,4,'0',STR_PAD_LEFT);
	if($str2==10000){
		$str2='0000';
		$str1=chr(ord($str1)+1);
	}
	return $str1.$str2;
}
*/
function getbehindNum($number){
	$arr=array("A"=>"0","B"=>"1","C"=>"2","D"=>"3","E"=>"4","F"=>"5","G"=>"6","H"=>"7","I"=>"8","J"=>"9","K"=>"10","L"=>"11","M"=>"12","N"=>"13","O"=>"14","P"=>"15","Q"=>"16","R"=>"17","S"=>"18","T"=>"19","U"=>"20","V"=>"21","W"=>"22","X"=>"23","Y"=>"24","Z"=>"25");
	$str1=substr($number, 0, 1);
	$str2=substr($number, 1, 4);
	$num=$arr["str1"]*9999+$str2+1;
//	$newstr1=$num mod 9999;
	$newstr1=array_search(($num % 9999),$arr);
	$newstr2=floor($num/9999);
	return $newstr1.$newstr2;
}
?>