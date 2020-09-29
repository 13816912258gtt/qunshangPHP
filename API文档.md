# 接口文档

## 目录：
[1、根据手机密码身份插入注册](#1根据手机密码身份插入注册)<br/>
[2、根据手机密码进行登录](#2根据手机密码进行登录)<br/>
[3、根据状态码和ID修改登录状态](#3根据状态码和ID修改登录状态)<br/>
[4、点赞或删除点赞操作](#4根据视频和用户ID进行点赞或删除点赞操作)<br/>
[5、通过用户ID修改各类表升级成为会员](#5通过用户ID升级成为会员)<br/>
[6、首页视频推送](#6根据用户ID返回视频列表)<br/>
[7、进入小黄车](#7根据用户ID返回带货商品信息列表)<br/>
[8、点击我的](#8根据用户ID返回短视频列表和点赞列表和带货商品信息)<br/>
[9、搜索界面](#9返回父分类子分类信息)<br/>
[10、加入购物车](#10根据用户ID商品规格ID加购数量加入购物车获更新购物车)<br/>
[11、购物车列表界面](#11根据用户ID获取购物车列表)<br/>
[12、关注视频列表界面](#12根据用户ID获取关注的人的视频列表)<br/>
[13、获取商品规格](#13根据商品ID获取商品规格列表)<br/>
[14、点击头像返回用户信息](#14根据用户ID和发布视频者ID获取发布者信息（包括是否关注）)<br/>
[15、提交订单生成主表和从表](#15根据订单信息新增订单信息)<br/>
[16、视频搜索返回相关视频](#16根据关键字返回相关视频信息)<br/>
[17、视频提交评论](#17上传视频评论)<br/>
[18、视频评论列表](#18根据视频ID返回列表，三个最热，剩下按时间)<br/>
[19、视频评论点赞](#19通过评论ID来进行点赞数+1)<br/>
[20、修改购物车数量并验证](#20通过购物车ID和数量来进行验证和修改购物车信息)<br/>
[21、修改用户头像](#21通过用户ID和头像文件上传并修改)<br/>
[22、修改用户个性签名](#22通过用户ID和个性签名修改)<br/>
[23、修改用户性别](#23通过用户ID和性别修改)<br/>
[24、订单、商品评论列表](#24通过商品ID返回所有订单评论信息)<br/>
[25、短视频基本信息（包括islike）](#25通过短视频ID和用户ID返回短视频信息)<br/>
[26、收货地址列表](#26通过用户ID返回所有的收货地址列表)<br/>
[27、新建收货地址](#27通过用户ID和收货地址信息新增)<br/>
[28、修改收货地址](#28通过地址ID和收货地址信息修改)<br/>
[29、发送验证码](#29通过手机号调用阿里云接口发送验证码)<br/>
[30、校验验证码](#29通过bizID和code校验验证码)<br/>
[31、关注或取消关注](#31通过uid和leadid进行点赞或删除点赞操作)<br/>
[32、行为积分](#32通过uid查找所有行为积分活动)<br/>
[33、浏览视频增加行为积分](#33通过uid增加用户浏览视频的行为积分)<br/>
[34、查询用户是否已经实名认证](#34通过uid查询用户是否已经实名认证)<br/>
[35、上传身份证并OCR识别](#35通过uid和上传的图片进行实名认证)<br/>
[36、获取抽奖码](#36通过uid获取抽奖码)<br/>

## 1、根据手机密码身份插入注册
     
### 请求URL：
	http://106.14.206.115/handlers/register.php

### 示例：
[http://106.14.206.115/handlers/register.php](http://106.14.206.115/handlers/register.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|photoData     |Y       |String     |手机号
	|checkCode     |Y       |String     |验证码
	|bizId         |Y       |String     |回执ID
	|invitedPeople |Y       |String     |邀请码

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
	http://106.14.206.115/handlers/login.php

### 示例：
[http://106.14.206.115/handlers/login.php](http://106.14.206.115/handlers/login.php)

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
		"userInfo":{
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
			"wallet":50,
			"address":".."
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
	http://106.14.206.115/handlers/index.php?token=token&uid=uid

### 示例：
[http://106.14.206.115/handlers/index.php?token=21983749&uid=000000001](http://106.14.206.115/handlers/index.php?token=21983749&uid=000000001)

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
	http://106.14.206.115/handlers/dolike.php

### 示例：
[http://106.14.206.115/handlers/dolike.php](http://106.14.206.115/handlers/dolike.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|videoid    |Y       |String     |视频ID
	|uid        |Y       |String     |用户ID

### 返回示例：
	点赞成功
	{
		"statusCode":"0",
		"likecount":2
	}
	取消点赞
	{
		"statusCode":"1",
		"likecount":"3"
	}
	
## 5、通过用户ID修改各类表升级成为会员
     
### 请求URL：
	http://106.14.206.115/handlers/uptomember.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/dolike.php?uid=000000001](http://106.14.206.115/handlers/dolike.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	无返回值
	
## 6、根据用户ID返回视频列表
     
### 请求URL：
	http://106.14.206.115/handlers/videolist.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/videolist.php?uid=000000001](http://106.14.206.115/handlers/videolist.php?uid=000000001)

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

## 7、根据用户ID返回带货商品信息列表
     
### 请求URL：
	http://106.14.206.115/handlers/yellowcar.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/yellowcar.php?uid=000000001](http://106.14.206.115/handlers/yellowcar.php?uid=000000001)

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
		"shoppingmall":"1",
		"freight":"10",
		"productaddress":"..",
		"replylist":[
			//三条最新评论
			"headimage":"",
			"uname":"",
			"replytime":"",
			"replytext":"",
			"replyimage":[
				".."
			],
			"replyattitude":""
		]
	}  
## 8、根据用户ID返回短视频列表和点赞列表和带货商品信息

### 请求URL：
	http://106.14.206.115/handlers/mine.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/mine.php?uid=000000002](http://106.14.206.115/handlers/mine.php?uid=000000002)

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
	
## 9、返回父分类子分类信息
     
### 请求URL：
	http://106.14.206.115/handlers/researchclass.php

### 示例：
[http://106.14.206.115/handlers/researchclass.php](http://106.14.206.115/handlers/researchclass.php)

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

## 10、根据用户ID商品规格ID加购数量加入购物车获更新购物车
     
### 请求URL：
	http://106.14.206.115/handlers/addtoshoppingcart.php?uid=uid&productspecid=productspecid&productnum=productnum

### 示例：
[http://106.14.206.115/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2](http://106.14.206.115/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2)

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

## 11、根据用户ID获取购物车列表
     
### 请求URL：
	http://106.14.206.115/handlers/shoppingcartlist.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/shoppingcartlist.php?uid=000000002](http://106.14.206.115/handlers/shoppingcartlist.php?uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID

### 返回示例：
	[
		{
			"sellername":"用户_1381691",
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
			"sellername":"用户_1381691",
			"productid":"3",
			"productimageurl":"..\/jpg",
			"productname":"test","
			productspeclist":[
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

## 12、根据用户ID获取关注的人的视频列表
     
### 请求URL：
	http://106.14.206.115/handlers/videolistfocus.php?uid=uid

### 示例：
[http://106.14.206.115/handlers/videolistfocus.php?uid=000000001](http://106.14.206.115/handlers/videolistfocus.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID
	|leadid        |Y       |String     |发布视频用户ID

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

## 13、根据商品ID获取商品规格列表
     
### 请求URL：
	http://106.14.206.115/handlers/getproductdedsc.php?productid=productid

### 示例：
[http://106.14.206.115/handlers/getproductdedsc.php?productid=3](http://106.14.206.115/handlers/getproductdedsc.php?productid=3)

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

## 14、根据用户ID和发布视频者ID获取发布者信息（包括是否关注）
     
### 请求URL：
	http://106.14.206.115/handlers/headimagetoinfo.php?publishid=publishid&uid=uid

### 示例：
[http://106.14.206.115/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002](http://106.14.206.115/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|publishid  |Y       |String     |发布视频用户ID
	|uid        |Y       |String     |用户ID

### 返回示例：
	{
		"isfocus":false,
		"userInfo":{
			"uname":"用户_1381691",
			"headimage":"\/\/hbimg.huabanimg.com\/6d28cfdb0f69acaa5c21651ebfb924a5b796dee646f30-JP2KuL_fw658\/format\/webp",
			"gender":"1",
			"introduce":"这个人很懒…",
			"identity":"3",
			"regtime":"2020-07-16 00:31:31",
			"invitenum":"0",
			"credit":"0",
			"wallet":"0"
		},
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

## 15、根据订单信息新增订单信息
     
### 请求URL：
	http://106.14.206.115/handlers/submitorder.php?coupon=coupon

### 示例：
[http://106.14.206.115/handlers/submitorder.php?coupon=coupon](http://106.14.206.115/handlers/submitorder.php?coupon='{"uid":"000000002","addressid":"1","productlist":[{"cartid":"4","discountid":"1","discuss":"emm..."}]}')

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|coupon     |Y       |Object     |订单信息
	
### coupon Object说明

	|参数		 |是否必选 |类型            |说明
	|uid         |Y       |String          |用户ID
	|addressid   |Y       |String          |地址ID
	|productlist |Y       |Array.<Object>  |商品列表

### productlist Array.<Object>说明

	|参数		      |是否必选 |类型       |说明
	|discountid       |Y       |String     |优惠券ID
	|discuss          |Y       |String     |留言
	|productid        |Y       |String     |商品ID
	|productspeclist  |Y       |Array      |商品规格列表
	|productimageurl  |Y       |String     |商品主图
	|productname      |Y       |String     |商品名称
	|sellername       |Y       |String     |卖家姓名
	
### productspeclist Array.<Object>说明

	|参数		      |是否必选 |类型       |说明
	|cartid           |Y       |String     |购物车ID
	|productspecid    |Y       |String     |商品规格ID
	|productspecdesc  |Y       |String     |商品规格描述
	|productoldprice  |Y       |String     |商品原价
	|productnum       |Y       |String     |加购数量
	
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
	
## 16、根据关键字返回相关视频信息
     
### 请求URL：
	http://106.14.206.115/handlers/researchvideo.php

### 示例：
[http://106.14.206.115/handlers/researchvideo.php](http://106.14.206.115/handlers/researchvideo.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|keyword    |Y       |String     |关键字搜索

### 返回示例：
	[
		{
			"videoid":"15",
			"posterurl":"",
			"videodesc":"test",
			"uname":"",
			"headimage":"",
			"likecount":"0"
		}
	] 

## 17、上传视频评论
     
### 请求URL：
	http://106.14.206.115/handlers/submitvideoreply.php

### 示例：
[http://106.14.206.115/handlers/submitvideoreply.php](http://106.14.206.115/handlers/submitvideoreply.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		  |是否必选 |类型       |说明
	|uid          |Y       |String     |用户ID
	|videoid      |Y       |String     |视频ID
	|replycontent |Y       |String     |评论内容

### 返回示例：
	{
		//添加评论成功
		"statusCode":"1",
		"Msg":"添加评论成功",
		"replyarr":{
			"replyid":"21",
			"videoid":"1",
			"replycontent":"good",
			"uid":"0000000003",
			"headimage":"",
			"uname":"用户_1381691",
			"likenum":"0",
			"fatherid":"0",
			"replytime":"2020-08-30 13:18:02"
		}
	} 
	
## 18、根据视频ID返回列表，三个最热，剩下按时间
     
### 请求URL：
	http://106.14.206.115/handlers/videoreplylist.php

### 示例：
[http://106.14.206.115/handlers/videoreplylist.php](http://106.14.206.115/handlers/videoreplylist.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		  |是否必选 |类型       |说明
	|videoid      |Y       |String     |视频ID

### 返回示例：
	[
		{
			"replyid":"12",
			"replycontent":"test",
			"headimage":"",
			"uname":"\/\/hbimg.hu",
			"likenum":"200",
			"replytime":"2020-08-12 20:36:44"
		},
		{
			"replyid":"6",
			"replycontent":"test",
			"headimage":"",
			"uname":"\/\/hbimg.hu",
			"likenum":"103",
			"replytime":"2020-08-12 20:36:41"
		},
		//前三个按照点赞数排序，剩下的按照时间顺序排出最新的
	]

## 19、通过评论ID来进行点赞数+1
     
### 请求URL：
	http://106.14.206.115/handlers/dovideoreplylike.php

### 示例：
[http://106.14.206.115/handlers/dovideoreplylike.php](http://106.14.206.115/handlers/dovideoreplylike.php)

### 请求方式：
	POST

### 参数类型：param

	|参数		  |是否必选 |类型       |说明
	|replyid      |Y       |String     |评论ID

### 返回示例：
	{
		"statusCode":"1",
		"Msg":"点赞成功"
	} 
	
## 20、通过购物车ID和数量来进行验证和修改购物车信息
     
### 请求URL：
	http://106.14.206.115/handlers/cartnum.php

### 示例：
[http://106.14.206.115/handlers/cartnum.php](http://106.14.206.115/handlers/cartnum.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|cartid      |Y       |String     |购物车ID
	|number      |Y       |Number     |修改后数量

### 返回示例：
	{
		//number大于库存或小于0，不符合常理
		"statusCode":"0"
	} 
	{
		//number符合要求，修改购物车的数量
		"statusCode":"1"
	} 
	{
		//number=0,直接删除购物车记录
		"statusCode":"2"
	}
	
## 21、通过用户ID和头像文件上传并修改
     
### 请求URL：
	http://106.14.206.115/handlers/alterheadimage.php

### 示例：
[http://106.14.206.115/handlers/alterheadimage.php](http://106.14.206.115/handlers/alterheadimage.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID
	|headimgFile |Y       |String     |头像文件

### 返回示例： 
	{
		"statusCode":"1",
		"Msg":"上传修改成功"
	} 
	{
		"statusCode":"2",
		"Msg":"上传失败"
	}
	
## 22、通过用户ID和个性签名修改
     
### 请求URL：
	http://106.14.206.115/handlers/alterintroduce.php

### 示例：
[http://106.14.206.115/handlers/alterintroduce.php](http://106.14.206.115/handlers/alterintroduce.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID
	|introduce   |Y       |String     |个性签名

### 返回示例： 
	{
		"statusCode":"1",
		"Msg":"修改成功"
	} 
	{
		"statusCode":"2",
		"Msg":"修改失败"
	}
	
## 23、通过用户ID和性别修改
     
### 请求URL：
	http://106.14.206.115/handlers/alterusergender.php

### 示例：
[http://106.14.206.115/handlers/alterusergender.php](http://106.14.206.115/handlers/alterusergender.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID
	|gender      |Y       |Number     |性别

### 返回示例： 
	{
		"statusCode":"1",
		"Msg":"修改成功"
	} 
	{
		"statusCode":"2",
		"Msg":"修改失败"
	}
	
## 24、通过商品ID返回所有订单评论信息
     
### 请求URL：
	http://106.14.206.115/handlers/orderreplylist.php

### 示例：
[http://106.14.206.115/handlers/orderreplylist.php](http://106.14.206.115/handlers/orderreplylist.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|productid   |Y       |String     |商品ID

### 返回示例： 
	[
		{
			"orderreplyid":"2",
			"uname":"用户_1234567",
			"headimage":"\/\/hbimg.huabanimg.com\/6d28cfdb0f69acaa5c21651ebfb924a5b796dee646f30-JP2KuL_fw658\/format\/webp",
			"replytext":"good",
			"replyimage":[
				".."
			],
			"replytime":"2020-08-22 15:31:56",
			"replyattitude":""
		},
		{
			"orderreplyid":"1",
			"uname":"用户_1381691",
			"headimage":"\/\/hbimg.huabanimg.com\/6d28cfdb0f69acaa5c21651ebfb924a5b796dee646f30-JP2KuL_fw658\/format\/webp",
			"replytext":"henhao",
			"replyimage":[
				".."
			],
			"replytime":"2020-08-22 15:31:45",
			"replyattitude":""
		}
	]
	
## 25、通过短视频ID和用户ID返回短视频信息
     
### 请求URL：
	http://106.14.206.115/handlers/videoinfo.php

### 示例：
[http://106.14.206.115/handlers/videoinfo.php](http://106.14.206.115/handlers/videoinfo.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|videoid     |Y       |String     |短视频ID
	|uid         |Y       |String     |用户ID

### 返回示例： 
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
	} 
	
## 26、通过用户ID返回所有的收货地址列表
     
### 请求URL：
	http://106.14.206.115/handlers/addresslist.php

### 示例：
[http://106.14.206.115/handlers/addresslist.php](http://106.14.206.115/handlers/addresslist.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID

### 返回示例： 
	[
		{
			"addressid":"2",
			"defaultaddress":"1",
			"urealname":"",
			"utel":"",
			"realaddress":""
		},
		{
			"addressid":"1",
			"defaultaddress":"0",
			"urealname":"gtt",
			"utel":"123456",
			"realaddress":"address..."
		}
	]
	
## 27、通过用户ID和收货地址信息新增
     
### 请求URL：
	http://106.14.206.115/handlers/addnewadress.php

### 示例：
[http://106.14.206.115/handlers/addnewaddress.php](http://106.14.206.115/handlers/addnewaddress.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	       |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID
	|urealname     |Y       |String     |收货人姓名
	|utel          |Y       |String     |收货人联系电话
	|realaddress   |Y       |String     |收货地址
	|defaultaddress|Y       |String     |是否为默认地址

### 返回示例： 
	{
		"statusCode":"1",
		"Msg":"新建收货地址成功",
		"newaddress":{
			"addressid":"6",
			"urealname":"emmm",
			"utel":"123456",
			"realaddress":"无",
			"defaultaddress":"0"
		}
	} 
	
## 28、通过地址ID和收货地址信息修改
     
### 请求URL：
	http://106.14.206.115/handlers/updateaddress.php

### 示例：
[http://106.14.206.115/handlers/updateaddress.php](http://106.14.206.115/handlers/updateaddress.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	       |是否必选 |类型       |说明
	|addressid     |Y       |String     |地址ID
	|urealname     |Y       |String     |收货人姓名
	|utel          |Y       |String     |收货人联系电话
	|realaddress   |Y       |String     |收货地址
	|defaultaddress|Y       |String     |是否为默认地址

### 返回示例： 
	{
		"statusCode":"1",
		"Msg":"修改收货地址成功",
		"newaddress":{
			"addressid":"2",
			"urealname":"test",
			"utel":"123",
			"realaddress":"test222",
			"defaultaddress":"1"
		}
	} 
	
## 29、通过手机号调用阿里云接口发送验证码
     
### 请求URL：
	http://106.14.206.115/aliApi/sendSms.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	       |是否必选    |类型        |说明
    |phoneNum      |Y          |String      |手机号码
	

### 返回示例： 
	{
	    "Message":"OK",
	    "RequestId":"5FA1DEEF-C123-40E3-8B6D-E18521657F9F",
	    "BizId":"135400600223487401^0",
	    "Code":"OK"
	}
## 30、通过bizID和code校验验证码
     
### 请求URL：
	http://106.14.206.115/handlers/checkCode.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param


	|参数	    |是否必选    |类型        |说明
    |bizId      |Y          |String      |由发码接口返回的bizId
    |code       |Y          |String      |用户输入的验证码
	

### 返回示例： 
	{
	"status":"OK"
	}

### 错误示例：
    {
        "status":"Wrong Code"//常用
    }
    {
        "status":"Wrong BizId"
    }
    {
        "status":"Parameter Missing"
    }

## 31、通过uid和leadid进行关注或删除关注操作
     
### 请求URL：
	http://106.14.206.115/handlers/focusleaduser.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param


	|参数	    |是否必选    |类型        |说明
    |followid   |Y          |String      |当前用户
    |leadid     |Y          |String      |发布视频的用户
	

### 返回示例： 
	{
		"isfocus":false//或为true
	}

## 32、通过uid查找所有行为积分活动
     
### 请求URL：
	http://106.14.206.115/handlers/getcredit.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
	

### 返回示例： 
	{
		"credit":"0.1",//总行为积分
		"invitenum":"0",//邀请的人数
		"invitearr":[
			"0",     //邀请的粉丝人数
			"0",     //邀请的会员人数
			"0"      //邀请的合伙人人数
		],
		"subcredit":{
			"0":"1", //五种行为分别获得的积分 0：点赞，1：浏览，3：转发，4：拉新，5：消费
			"1":"0",
			"3":"0",
			"4":"0",
			"5":"0"
		},
		"behaviorlist":[
			{
				"behavior":"0",
				"getcredit":"0.1",
				"gettime":"2020-09-22 00:10:59"
			}//最新的获得行为积分记录
		]
	}
	
## 33、通过uid增加用户浏览视频的行为积分
     
### 请求URL：
	http://106.14.206.115/handlers/watchvideo.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
	

### 返回示例： 
	{
		"statusCode":1 //成功
	} 
	
## 34、通过uid查询用户是否已经实名认证
     
### 请求URL：
	http://106.14.206.115/handlers/identity.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
	

### 返回示例： 
	{
		"statusCode": 'Unidentified' //未认证
	} 
	{
    	"statusCode": 'Identified' //已认证
    } 
## 36、通过uid和上传的图片进行实名认证
     
### 请求URL：
	http://106.14.206.115/handlers/checkIdCard.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
    |img_1      |Y          |File        |身份证正面照片
    |img_2      |Y          |File        |身份证反面照片
	

### 返回示例： 
	{
	    "status":"OK"  //成功
	}
	{
	    "status":"Fail",
	    "errMes":"User identified already."  //用户已经实名认证
	}
	{
	    "status":"Fail",
	    "errMes":"Parameter missing."  //缺少参数或者图片数据
    }
    {
        "status":"Fail",
        "errMes":"Aliyun OCR Fail."  //阿里云接口失效或者图片不是身份证
    }
    {
        "status":"Fail",
        "errMes":"Exception of img_1: wrong type of image."  //图片类型不支持，仅支持png，jpg和gif
    }
	
## 35、通过uid获取抽奖码
     
### 请求URL：
	http://106.14.206.115/handlers/getlottery.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID

### 返回示例： 
	{
		"statusCode":1,
		"number":[
			"A0003",
			"A0004",
			"A0005"
		]
	} 
	{
		"statusCode":0 //用户已经获取过抽奖码
	} 