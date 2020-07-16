<?php
//建立与MySQL数据库的连接
 function get_connect(){
	//数据库默认连接信息
	$config = array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'dbname' => 'db_qunshang',
		'port' => 3306
	);
    $link = @mysql_connect($config['host'].':'.$config['port'],$config['user'],$config['password']);		
	if(!$link){
	  die('数据库连接失败!') . mysql_error();	
    }	
	//设置字符集，选择数据库
	mysql_query('set names '.$config['charset']);
	mysql_query('use `'.$config['dbname'].'`'); 
	return $link; 
 }
//对SQL命令参数进行输出转义
 function  mysql_dataCheck($parameter){
	 return mysql_real_escape_string($parameter);
 }

//执行查询操作
 function execQuery($strQuery,$link){
   //$link=get_connect();
   $res=@mysql_query($strQuery,$link);
   if(!$res) die(mysql_error());
   //定义结果数组，用以保存结果信息
   $results = array();
   //遍历结果集，获取每条记录的详细数据
    while($row = mysql_fetch_assoc($res)){
	//把从结果集中取出的每一行数据赋值给$emp_info数组
	  $results[] = $row;
   }	
   mysql_free_result($res);//释放记录集
   mysql_close();//关闭数据库连接
   return $results; 
 }
  
 //执行增、删、改操作
 function execUpdate($strUpdate,$link){
  // $link=get_connect();
   $res=@mysql_query($strUpdate,$link);
   if(!$res) die('数据库操作失败!').mysql_error();   
   mysql_close();
   return $res;   
 }
 
 ?>