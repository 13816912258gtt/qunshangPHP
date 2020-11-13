<?PHP
require_once 'comm/lottery.dao.php';
require_once 'comm/user.dao.php';
//定义期数
$period=1;
$lotteryid=getLastId($period);
$drawlotteryid=mt_rand(1,$lotteryid);
/*
$firstlevel=1;
$secondlevel=0;
$thirdlevel=0;
*/
//一等奖、二等奖、三等奖的个数
$levelarr=array(1,0,0);
$drawarr=array();
for($j=0;$j<3;$j++){
	for($i=0;$i<$levelarr[$j];$i++){
		$drawlotteryid=mt_rand(1,$lotteryid);
		if(in_array($drawlotteryid,$drawarr)){
			$i--;
			continue;
		}else{
			array_push($drawarr,$drawlotteryid);
			if($lotteryarr=findLotteryById($drawlotteryid)){
				$uid=$lotteryarr['uid'];
				$number=$lotteryarr['number'];
				$period=$lotteryarr['period'];
				$userarr=findUserByUid($uid);
				$utel=$userarr['utel'];
				$realarr=findRealById($uid);
				$realname=$realarr['realname'];
				$realidentity=$realarr['realidentity'];
				$level=$j+1;
				addDrawLottery($number,$uid,$realname,$realidentity,$level,$utel,$period);
			}
			else{
				$i--;
				continue;
			}
		}
		
	}
}
$rs=findResult($period);
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>