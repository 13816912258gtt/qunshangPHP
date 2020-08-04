# 接口文档

## 目录：
[1、根据手机密码身份插入注册](#1根据手机密码身份插入注册)<br/>
[2、根据手机密码进行登录](#2根据手机密码进行登录)<br/>
[3、根据状态码和ID修改登录状态](#3根据状态码和ID修改登录状态)<br/>
[4、点赞或删除点赞操作](#4根据视频和用户ID进行点赞或删除点赞操作)<br/>
[5、通过用户ID修改各类表升级成为会员](#5通过用户ID升级成为会员)<br/>
[6、首页视频推送](#6根据用户ID返回视频列表)<br/>
[7、进入小黄车](#7根据用户ID返回带货商品信息列表)<br/>
[8、点击我的](#8根据用户ID返回短视频列表，点赞列表，带货商品信息)<br/>

## 1、根据手机密码身份插入注册
     
### 请求URL：
	http://localhost:3000/register.php

### 示例：
[http://localhost:3000/register.php](http://localhost:3000/register.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|photoData  |Y       |String     |手机号
	|passData   |Y       |String     |密码
	|identity   |Y       |String     |预选身份

### 返回示例：
	注册成功
	{
		"statusCode":1,
		"photoData":123
	} 
	手机号已被注册
	{
		"statusCode":2,
		"errMsg":"手机号已注册"
	} 
## 2、根据手机密码进行登录
     
### 请求URL：
	http://localhost:3000/login.php

### 示例：
[http://localhost:3000/login.php](http://localhost:3000/login.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|photoData  |Y       |String     |手机号
	|passData   |Y       |String     |密码

### 返回示例：
	登录成功
	{
		"statusCode":1,
		"Msg":"登陆成功",
		"userIofo":{
			"uid":1,
			"utel":"12345678915",
			"uname":"aa",
			"headimage":"img\jpg",
			"gender":1,
			"introduce":"这个人很懒。。",
			"identity":2,
			"regtime":"2020-06-06 16:16:16",
			"invitecode":"1111",
			"inviteid":6,
			"invitenum":10,
			"credit":20,
			"wallet":50
		}
	} 
	密码不正确
	{
		"statusCode":2,
		"errMsg":"密码不正确"
	} 
	手机号未注册
	{
		"statusCode":3,
		"errMsg":"手机号未注册"
	}
	
## 3、根据状态码和ID修改登录状态
     
### 请求URL：
	http://localhost:3000/index.php?token=token&uid=uid

### 示例：
[http://localhost:3000/index.php?token=21983749&uid=000000001](http://localhost:3000/index.php?token=21983749&uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|token      |Y       |String     |时间戳
	|uid        |Y       |String     |用户ID

### 返回示例：
	登录状态修改成功
	{
		"statusCode":1,
		"Msg":"成功"
	} 
	登录状态修改失败
	{
		"statusCode":2,
		"errMsg":"密码不正确"
	} 
## 4、根据视频和用户ID进行点赞或删除点赞操作
     
### 请求URL：
	http://localhost:3000/dolike.php?uid=uid&videoid=videoid

### 示例：
[http://localhost:3000/dolike.php?uid=000000001&videoid=2](http://localhost:3000/dolike.php?uid=000000001&videoid=2)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|videoid    |Y       |String     |视频ID
	|uid        |Y       |String     |用户ID

### 返回示例：
	点赞成功
	{
		"likecount":2
	}
	
## 5、通过用户ID修改各类表升级成为会员
     
### 请求URL：
	http://localhost:3000/uptomember.php?uid=uid

### 示例：
[http://localhost:3000/dolike.php?uid=000000001](http://localhost:3000/dolike.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	无返回值
	
## 6、根据用户ID返回视频列表
     
### 请求URL：
	http://localhost:3000/videolist.php?uid=uid

### 示例：
[http://localhost:3000/videolist.php?uid=000000001](http://localhost:3000/videolist.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	[
		{
			"videoid":10,
			"url":"",
			"posterurl":"",
			"videodesc":"",
			"uid":"0000000002",
			"uname":"",
			"hedimage":"",
			"productid":"0",
			"publishtime":"2020-08-04 18:44:23",
			"islike":false,
			"likecount":"0",
			"replycount":"0"
		},
		{
			"videoid":7,
			"url":"",
			"posterurl":"",
			"videodesc":"",
			"uid":"0000000002",
			"uname":"",
			"hedimage":"",
			"productid":"0",
			"publishtime":"2020-08-04 18:44:21",
			"islike":false,
			"likecount":"0",
			"replycount":"0"
		},10条数据
	]

## 7、根据用户ID返回带货商品信息列表
     
### 请求URL：
	http://localhost:3000/yellowcar.php?uid=uid

### 示例：
[http://localhost:3000/yellowcar.php?uid=000000001](http://localhost:3000/yellowcar.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	{
		"productid":"3",
		"productname":"test",
		"productcover":"..\/jpg",
		"productimage":"..\/jpg",
		"introduceimage":"..\/jpg",
		"productoldprice":"0",
		"productnewprice":"0",
		"productdesc":"暂无描述",
		"commissionrate":"3",
		"sellerid":"0000000003",
		"productstate":"2",
		"replynum":"0",
		"sellnum":"0",
		"classchildid":"1",
		"shoppingmall":"1"
	} 
## 8、根据用户ID返回短视频列表，点赞列表，带货商品信息
     
### 请求URL：
	http://localhost:3000/mine.php?uid=uid

### 示例：
[http://localhost:3000/mine.php?uid=000000002](http://localhost:3000/mine.php?uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	{
		"myvideolist":[
			{
				"videoid":"1",
				"url":"",
				"posterurl":"",
				"videodesc":"",
				"uid":"0000000002",
				"uname":"",
				"hedimage":"",
				"productid":"0",
				"publishtime":"2020-07-23 21:34:14",
				"likecount":"0"
			},所有我的视频数据
		],
		"mylikevideolist":[
			{
				"videoid":"1",
				"url":"",
				"posterurl":"",
				"videodesc":"",
				"uid":"0000000002",
				"uname":"",
				"hedimage":"",
				"productid":"0",
				"publishtime":"2020-07-23 21:34:14",
				"likecount":"0"
			}
		],
		"product":[
			{
				"productid":"2",
				"productname":"test",
				"productcover":"..\/jpg",
				"productimage":"",
				"introduceimage":"",
				"productoldprice":"100",
				"productnewprice":"50",
				"productdesc":"暂无描述",
				"commissionrate":"5",
				"sellerid":"0000000002",
				"productstate":"2",
				"replynum":"0",
				"sellnum":"0",
				"classchildid":"1",
				"shoppingmall":"1"
			}
		]
	} 