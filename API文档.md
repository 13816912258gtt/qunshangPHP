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
[9、搜索界面](#9返回父分类子分类信息)<br/>
[10、加入购物车](#10根据用户ID商品规格ID加购数量加入购物车获更新购物车)<br/>
[11、购物车列表界面](#11根据用户ID获取购物车列表)<br/>
[12、关注视频列表界面](#12根据用户ID获取关注的人的视频列表)<br/>
[13、获取商品规格](#13根据商品ID获取商品规格列表)<br/>
[14、点击头像返回用户信息](#14根据用户ID和发布视频者ID获取发布者信息（包括是否关注）)<br/>
[15、提交订单生成主表和从表](#15根据订单信息新增订单信息)<br/>

## 1、根据手机密码身份插入注册
     
### 请求URL：
	http://212.129.235.182/handlers/register.php

### 示例：
[http://212.129.235.182/handlers/register.php](http://212.129.235.182/handlers/register.php)

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
	http://212.129.235.182/handlers/login.php

### 示例：
[http://212.129.235.182/handlers/login.php](http://212.129.235.182/handlers/login.php)

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
	http://212.129.235.182/handlers/index.php?token=token&uid=uid

### 示例：
[http://212.129.235.182/handlers/index.php?token=21983749&uid=000000001](http://212.129.235.182/handlers/index.php?token=21983749&uid=000000001)

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
	http://212.129.235.182/handlers/dolike.php?uid=uid&videoid=videoid

### 示例：
[http://212.129.235.182/handlers/dolike.php?uid=000000001&videoid=2](http://212.129.235.182/handlers/dolike.php?uid=000000001&videoid=2)

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
	http://212.129.235.182/handlers/uptomember.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/dolike.php?uid=000000001](http://212.129.235.182/handlers/dolike.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	无返回值
	
## 6、根据用户ID返回视频列表
     
### 请求URL：
	http://212.129.235.182/handlers/videolist.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/videolist.php?uid=000000001](http://212.129.235.182/handlers/videolist.php?uid=000000001)

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
			"isfocus":false,
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
			"isfocus":false,
			"likecount":"0",
			"replycount":"0"
		},10条数据
	]

## 7、进入小黄车
     
### 请求URL：
	http://212.129.235.182/handlers/yellowcar.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/yellowcar.php?uid=000000001](http://212.129.235.182/handlers/yellowcar.php?uid=000000001)

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
		"productimage":[
			"https:\/\/img.alicdn.com\/imgextra\/i2\/389048191\/O1CN01bBuDHw2ANWk6aEJHx_!!389048191.jpg"
		],
		"introduceimage":[
			"https:\/\/img.alicdn.com\/imgextra\/i1\/389048191\/O1CN01qUL1sE2ANWjuoWvfw_!!389048191.jpg",
			"https:\/\/img.alicdn.com\/imgextra\/i4\/389048191\/O1CN01bTjtOC2ANWk68PUG9_!!389048191.jpg"
		],
		"productoldprice":"0",
		"productnewprice":"0",
		"productdesc":"\u8fd9\u4e2a\u4eba\u5f88\u61d2\u2026",
		"commissionrate":"3",
		"sellerid":"0000000003",
		"productstate":"2",
		"replynum":"0",
		"sellnum":"0",
		"classchildid":"1",
		"shoppingmall":"1"
	}  
## 8、点击我的
     
### 请求URL：
	http://212.129.235.182/handlers/mine.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/mine.php?uid=000000002](http://212.129.235.182/handlers/mine.php?uid=000000002)

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
	
## 9、搜索界面
     
### 请求URL：
	http://212.129.235.182/handlers/researchclass.php

### 示例：
[http://212.129.235.182/handlers/researchclass.php](http://212.129.235.182/handlers/researchclass.php)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明


### 返回示例：
	[
		{
			"productclassid":"2",
			"classname":"医疗",
			"classimage":"url..",
			"childclass":[
				{
					"classchildid":"3",
					"classchildname":"医疗器械",
					"classchildimage":"url.."
				},
				{
					"classchildid":"4",
					"classchildname":"医疗药品",
					"classchildimage":"url.."
				}
			]
		},
		{
			"productclassid":"3",
			"classname":"果蔬",
			"classimage":"url..",
			"childclass":[
				{
					"classchildid":"5",
					"classchildname":"水果",
					"classchildimage":"url.."
				},
				{
					"classchildid":"6",
					"classchildname":"蔬菜",
					"classchildimage":"url.."
				}
			]
		}
	]  

## 10、加入购物车
     
### 请求URL：
	http://212.129.235.182/handlers/addtoshoppingcart.php?uid=uid&productspecid=productspecid&productnum=productnum

### 示例：
[http://212.129.235.182/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2](http://212.129.235.182/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID
	|productspecid |Y       |String     |商品规格ID
	|productnum    |Y       |String     |加购数量

### 返回示例：
	//成功事例
	{
		"statusCode":1,
		"Msg":"加入购物车成功",
		"num":"8"
	} 
	//失败事例
	{
		"statusCode":2,
		"Msg":"加入购物车失败"
	}

## 11、购物车列表界面
     
### 请求URL：
	http://212.129.235.182/handlers/shoppingcartlist.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/shoppingcartlist.php?uid=000000002](http://212.129.235.182/handlers/shoppingcartlist.php?uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID

### 返回示例：
	[
		{
			"sellerid":"0000000002",
			"productid":"2",
			"productimageurl":"\/",
			"productname":"test",
			"productspeclist":[
				{
					"cartid":"5",
					"productspecid":"1",
					"productspecdesc":"..",
					"productoldprice":"0",
					"productnum":"4"
				}
			]
		},
		{
			"sellerid":"0000000003",
			"productid":"3",
			"productimageurl":"..\/jpg",
			"productname":"test",
			"productspeclist":[
				{
					"cartid":"3",
					"productspecid":"1",
					"productspecdesc":"暂无",
					"productoldprice":"0",
					"productnum":"8"
				},
				{
					"cartid":"4",
					"productspecid":"2",
					"productspecdesc":"暂无",
					"productoldprice":"20",
					"productnum":"8"
				}
			]
		}
	] 

## 12、关注视频列表界面
     
### 请求URL：
	http://212.129.235.182/handlers/videolistfocus.php?uid=uid

### 示例：
[http://212.129.235.182/handlers/videolistfocus.php?uid=000000001](http://212.129.235.182/handlers/videolistfocus.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID

### 返回示例：
	[
		{
			"videoid":"15",
			"url":"",
			"posterurl":"",
			"videodesc":"",
			"uid":"0000000002",
			"uname":"",
			"headimage":"",
			"productid":"0",
			"publishtime":"2020-08-04 18:44:28",
			"islike":false,
			"isfocus":true,
			"likecount":"0",
			"replycount":"0"
		},
		{
			"videoid":"14",
			"url":"",
			"posterurl":"",
			"videodesc":"",
			"uid":"0000000002",
			"uname":"",
			"headimage":"",
			"productid":"0",
			"publishtime":"2020-08-04 18:44:27",
			"islike":false,
			"isfocus":true,
			"likecount":"0",
			"replycount":"0"
		},10条视频
	]

## 13、获取商品规格
     
### 请求URL：
	http://212.129.235.182/handlers/getproductdedsc.php?productid=productid

### 示例：
[http://212.129.235.182/handlers/getproductdedsc.php?productid=3](http://212.129.235.182/handlers/getproductdedsc.php?productid=3)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|productid     |Y       |String     |商品ID

### 返回示例：
	[
		{
			"productspecid":"1",
			"productspecdesc":"暂无",
			"storenum":"100",
			"productoldprice":"0"
		},
		{
			"productspecid":"2",
			"productspecdesc":"暂无",
			"storenum":"50",
			"productoldprice":"20"
		}
	] 

## 14、点击头像返回用户信息
     
### 请求URL：
	http://212.129.235.182/handlers/headimagetoinfo.php?publishid=publishid&uid=uid

### 示例：
[http://212.129.235.182/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002](http://212.129.235.182/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|publishid  |Y       |String     |发布视频用户ID
	|uid        |Y       |String     |用户ID

### 返回示例：
	{
		"isfocus":false,
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

## 15、提交订单生成主表和从表
     
### 请求URL：
	http://212.129.235.182/handlers/submitorder.php?coupon=coupon

### 示例：
[http://212.129.235.182/handlers/submitorder.php?coupon=coupon](http://212.129.235.182/handlers/submitorder.php?coupon='{"uid":"000000002","addressid":"1","productlist":[{"cartid":"4","discountid":"1","discuss":"emm..."}]}')

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|coupon     |Y       |Object     |订单信息
	
### coupon Object说明

	|参数		 |是否必选 |类型            |说明
	|uid         |Y       |String         |用户ID
	|addressid   |Y       |String         |地址ID
	|productlist |Y       |Array.<Object>  |商品列表

### productlist Array.<Object>说明

	|参数		 |是否必选 |类型       |说明
	|cartid      |Y       |String     |购物车ID
	|discountid  |Y       |String     |优惠券ID
	|discuss     |Y       |String     |留言

### 返回示例：
	[
		{
			"mainorderid":10,
			"orderstate":0,
			"finalprice":40
		}
	]
	//库存不足
	[
		"statusCode"=>0,
		"Msg"=>"库存不足"
	]