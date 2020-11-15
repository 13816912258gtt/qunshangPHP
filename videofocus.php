<?PHP
$followid=(int)$_POST['followid'];
$leadid=(int)$_POST['leadid'];
require_once 'comm/video.dao.php';
addVideoFocus($followid,$leadid);
$rs=array()
?>