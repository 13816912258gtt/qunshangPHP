<?php
require_once './comm/code.dao.php';

$res = array();

$paramFlag = isset($_POST['bizId'])&&isset($_POST['code']);
if(!$paramFlag){
    $res['status'] = 'Parameter Missing';
}else{
    $bizId = $_POST['bizId'];
    $code = $_POST['code'];
    $query = findCodeByBizId($bizId);
    if(empty($query)){
        $res['status'] = 'Wrong BizId';
    }else{
        if($query['code']==$code){
            $res['status'] = 'OK';
        }else{
            $res['status'] = 'Wrong Code';
    }
    }
}

echo json_encode($res);

?>