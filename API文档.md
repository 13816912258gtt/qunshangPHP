# 接口文档

## 目录：
[1、根据手机密码身份插入注册](#1根据手机密码身份插入注册)<br/>
[2、根据手机密码进行登录](#2根据手机密码进行登录)<br/>
[3、根据状态码和ID修改登录状态](#3根据状态码和ID修改登录状态)<br/>
[4、喜欢或删除喜欢操作](#4根据视频和用户ID进行喜欢或删除喜欢操作)<br/>
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
[37、修改用户名](#37通过uid和uname修改用户名)<br/>
[38、获取抽奖结果](#38获取抽奖结果)<br/>
[39、通过uid和上传的图片进行实名认证（新）](#39通过uid和上传的图片进行实名认证（新）)<br/>
[40、实名认证](#40实名认证)<br/>
[41、视频点赞](#41根据Uid和videoid进行点赞)<br/>
[42、返回关注的人的信息](#42根据Uid获得关注的人的信息列表)<br/>
[43、获得省市地址列表](#43根据parentid获得下一级地址列表)<br/>
[44、获得用户的默认地址](#44根据uid获得该用户的默认收货地址信息)<br/>
[45、获得新注册用户信息](#45返回新成为粉丝的前三名用户)<br/>
[46、新增消费行为积分](#46根据从订单id和uid增加消费行为)<br/>
[47、更新合伙人表](#47通过uid插入合伙人表新信息)<br/>
[48、会员费合伙人收益](#48通过uid和订单项id计算合伙人收益并且创建会员用户信息)<br/>
[49、摇钱树（新）](#49通过uid获得今天，昨天，本周，上月，本月数据)<br/>


## 1、根据手机密码身份插入注册
     
### 请求URL：
	http://www.equnshang.com/handlers/register.php

### 示例：
[http://www.equnshang.com/handlers/register.php](http://www.equnshang.com/handlers/register.php)

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
		"photoData":12345678910
	} 
	手机号已被注册
	{
		"statusCode":2,
		"errMsg":"手机号已注册"
	} 
	验证码错误
	{
		"statusCode":2,
		"errMsg":"Wrong Code"
	} 
	
## 2、根据手机密码进行登录
     
### 请求URL：
	http://www.equnshang.com/handlers/login.php

### 示例：
[http://www.equnshang.com/handlers/login.php](http://www.equnshang.com/handlers/login.php)

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
			"uname":"用户915",
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
	http://www.equnshang.com/handlers/index.php?token=token&uid=uid

### 示例：
[http://www.equnshang.com/handlers/index.php?token=21983749&uid=000000001](http://www.equnshang.com/handlers/index.php?token=21983749&uid=000000001)

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
## 4、根据视频和用户ID进行喜欢或删除喜欢操作
     
### 请求URL：
	http://www.equnshang.com/handlers/dolike.php

### 示例：
[http://www.equnshang.com/handlers/dolike.php](http://www.equnshang.com/handlers/dolike.php)

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
	http://www.equnshang.com/handlers/uptomember.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/dolike.php?uid=000000001](http://www.equnshang.com/handlers/dolike.php?uid=000000001)

### 请求方式：
	GET

### 参数类型：param

	|参数		|是否必选 |类型       |说明
	|uid        |Y       |String     |用户ID

### 返回示例：
	无返回值
	
## 6、根据用户ID返回视频列表
     
### 请求URL：
	http://www.equnshang.com/handlers/videolist.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/videolist.php?uid=000000001](http://www.equnshang.com/handlers/videolist.php?uid=000000001)

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
			"replycount":"0",
			"zancount": "0",
			"iszan": true
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
			"replycount":"0",
			"zancount": "0",
			"iszan": true
		},10条数据
	]

## 7、根据用户ID返回带货商品信息列表
     
### 请求URL：
	http://www.equnshang.com/handlers/yellowcar.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/yellowcar.php?uid=000000001](http://www.equnshang.com/handlers/yellowcar.php?uid=000000001)

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
	http://www.equnshang.com/handlers/mine.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/mine.php?uid=000000002](http://www.equnshang.com/handlers/mine.php?uid=000000002)

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
				"likecount":"0",
				"zancount":"10"
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
				"likecount":"0",
				"zancount":"10"
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
	http://www.equnshang.com/handlers/researchclass.php

### 示例：
[http://www.equnshang.com/handlers/researchclass.php](http://www.equnshang.com/handlers/researchclass.php)

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
	http://www.equnshang.com/handlers/addtoshoppingcart.php?uid=uid&productspecid=productspecid&productnum=productnum

### 示例：
[http://www.equnshang.com/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2](http://www.equnshang.com/handlers/addtoshoppingcart.php?uid=000000002&productspecid=1&productnum=2)

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
	http://www.equnshang.com/handlers/shoppingcartlist.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/shoppingcartlist.php?uid=000000002](http://www.equnshang.com/handlers/shoppingcartlist.php?uid=000000002)

### 请求方式：
	GET

### 参数类型：param

	|参数		   |是否必选 |类型       |说明
	|uid           |Y       |String     |用户ID

### 返回示例：
	[
	    {
	        "sellername": "CEO",
	        "sellerid": "0000000001",
	        "productlist": [
	            {
	                "productid": "5",
	                "productimageurl": "http:\/\/www.equnshang.com\/goodsPic\/5.jpg",
	                "productname": "蝉花虫草孢子粉（金标）",
	                "productspeclist": [
	                    {
	                        "cartid": "7",
	                        "productspecid": "5",
	                        "productspecdesc": "30克（2克X15）",
							"specimgurl": null,
	                        "productoldprice": "1999",
	                        "productnum": "1"
	                    }
	                ]
	            },
	            {
	                "productid": "12",
	                "productimageurl": "http:\/\/www.equnshang.com\/goodsPic\/14.jpg",
	                "productname": "虫草益生菌粉",
	                "productspeclist": [
	                    {
	                        "cartid": "8",
	                        "productspecid": "14",
	                        "productspecdesc": "  1.5g*30",
							"specimgurl": null,
	                        "productoldprice": "99",
	                        "productnum": "1"
	                    }
	                ]
	            }
	        ]
	    }
	]

## 12、根据用户ID获取关注的人的视频列表
     
### 请求URL：
	http://www.equnshang.com/handlers/videolistfocus.php?uid=uid

### 示例：
[http://www.equnshang.com/handlers/videolistfocus.php?uid=000000001](http://www.equnshang.com/handlers/videolistfocus.php?uid=000000001)

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
			"replycount":"0",
			"zancount":"10"
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
			"replycount":"0",
			"zancount":"10"
		},10条视频
	]

## 13、根据商品ID获取商品规格列表
     
### 请求URL：
	http://www.equnshang.com/handlers/getproductdedsc.php?productid=productid

### 示例：
[http://www.equnshang.com/handlers/getproductdedsc.php?productid=3](http://www.equnshang.com/handlers/getproductdedsc.php?productid=3)

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
	http://www.equnshang.com/handlers/headimagetoinfo.php?publishid=publishid&uid=uid

### 示例：
[http://www.equnshang.com/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002](http://www.equnshang.com/handlers/headimagetoinfo.php?publishid=000000001&uid=000000002)

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
				"likecount":"0",
				"zancount":"10"
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
				"likecount":"0",
				"zancount":"1"
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
	http://www.equnshang.com/handlers/submitorder.php?coupon=coupon

### 示例：
[http://www.equnshang.com/handlers/submitorder.php?coupon=coupon](http://www.equnshang.com/handlers/submitorder.php?coupon='{"uid":"000000002","addressid":"1","productlist":[{"cartid":"4","discountid":"1","discuss":"emm..."}]}')

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
	http://www.equnshang.com/handlers/researchvideo.php

### 示例：
[http://www.equnshang.com/handlers/researchvideo.php](http://www.equnshang.com/handlers/researchvideo.php)

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
	http://www.equnshang.com/handlers/submitvideoreply.php

### 示例：
[http://www.equnshang.com/handlers/submitvideoreply.php](http://www.equnshang.com/handlers/submitvideoreply.php)

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
	http://www.equnshang.com/handlers/videoreplylist.php

### 示例：
[http://www.equnshang.com/handlers/videoreplylist.php](http://www.equnshang.com/handlers/videoreplylist.php)

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
	http://www.equnshang.com/handlers/dovideoreplylike.php

### 示例：
[http://www.equnshang.com/handlers/dovideoreplylike.php](http://www.equnshang.com/handlers/dovideoreplylike.php)

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
	http://www.equnshang.com/handlers/cartnum.php

### 示例：
[http://www.equnshang.com/handlers/cartnum.php](http://www.equnshang.com/handlers/cartnum.php)

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
	http://www.equnshang.com/handlers/alterheadimage.php

### 示例：
[http://www.equnshang.com/handlers/alterheadimage.php](http://www.equnshang.com/handlers/alterheadimage.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID
	|headimgFile |Y       |String     |头像文件

### 返回示例： 
	{
		"statusCode":"1",
		"imgurl":"http://www.equnshang.com/asdsf.jpg"
	} 
	{
		"statusCode":"2",
		"Msg":"上传失败"
	}
	
## 22、通过用户ID和个性签名修改
     
### 请求URL：
	http://www.equnshang.com/handlers/alterintroduce.php

### 示例：
[http://www.equnshang.com/handlers/alterintroduce.php](http://www.equnshang.com/handlers/alterintroduce.php)

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选 |类型       |说明
	|uid         |Y       |String     |用户ID
	|introduce   |Y       |String     |个性签名

### 返回示例： 
	{
		"statusCode":"1",
		"introduce":"..."
	} 
	{
		"statusCode":"2",
		"Msg":"修改失败"
	}
	
## 23、通过用户ID和性别修改
     
### 请求URL：
	http://www.equnshang.com/handlers/alterusergender.php

### 示例：
[http://www.equnshang.com/handlers/alterusergender.php](http://www.equnshang.com/handlers/alterusergender.php)

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
	http://www.equnshang.com/handlers/orderreplylist.php

### 示例：
[http://www.equnshang.com/handlers/orderreplylist.php](http://www.equnshang.com/handlers/orderreplylist.php)

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
	http://www.equnshang.com/handlers/videoinfo.php

### 示例：
[http://www.equnshang.com/handlers/videoinfo.php](http://www.equnshang.com/handlers/videoinfo.php)

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
		"replycount":"0",
		"iszan":false,
		"zancount":"0",
	} 
	
## 26、通过用户ID返回所有的收货地址列表
     
### 请求URL：
	http://www.equnshang.com/handlers/addresslist.php

### 示例：
[http://www.equnshang.com/handlers/addresslist.php](http://www.equnshang.com/handlers/addresslist.php)

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
	http://www.equnshang.com/handlers/addnewadress.php

### 示例：
[http://www.equnshang.com/handlers/addnewaddress.php](http://www.equnshang.com/handlers/addnewaddress.php)

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
	http://www.equnshang.com/handlers/updateaddress.php

### 示例：
[http://www.equnshang.com/handlers/updateaddress.php](http://www.equnshang.com/handlers/updateaddress.php)

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
	http://www.equnshang.com/aliApi/sendSms.php

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
	http://www.equnshang.com/handlers/checkCode.php

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
	http://www.equnshang.com/handlers/focusleaduser.php

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
	http://www.equnshang.com/handlers/getcredit.php

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
		"quncoin":1,
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
	http://www.equnshang.com/handlers/watchvideo.php

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
	http://www.equnshang.com/handlers/identity.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
	

### 返回示例： 
    {   
        "status": 1,
        "errMsg":"User unidentitied" //未认证
    }
	{
        "status": 0,
        "realInfo": {
            "realnameid": "4",
            "uid": "0000000011",
            "realname": "呵呵呵",
            "realidentity": "361232200001160014",
            "realaddress": "xx省xx市xx县xx街道xx室",
            "realgender": "0",
            "realbirth": "20000116",
            "realnation": "汉"
        }
    }
	
## 35、通过uid和上传的图片进行实名认证
     
### 请求URL：
	http://www.equnshang.com/handlers/checkIdCard.php

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
	    "used"：0 //身份证没有实名认证过
	}
	{
	    "status":"OK"  //成功
        "used"：1 //身份证已经实名认证过
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
	
## 36、通过uid获取抽奖码
     
### 请求URL：
	http://www.equnshang.com/handlers/getlottery.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID

### 返回示例： 
	{
		"statusCode":0,
		"number":[
			"A0003",
			"A0004",
			"A0005"
		],
		"period":1,
		"drawtime":"2020-10-18 18:00:00"
	} 
	{
		"statusCode":1, //用户已经获取过抽奖码
		"number": [
		        "A0000"
		],
		"period":1,
		"drawtime":"2020-10-18 18:00:00"
	} 
	
## 37、通过uid和uname修改用户名
     
### 请求URL：
	http://www.equnshang.com/handlers/alteruname.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
	|uname      |Y          |String      |用户名

### 返回示例： 
	{
		"statusCode":0,
		"uname":"abc"
	} 
	{
		"statusCode":1, 
		"Msg": "用户名长度错误"
	} 
	
## 38、获取抽奖结果
     
### 请求URL：
	http://www.equnshang.com/handlers/drawlottery.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    

### 返回示例： 
	[
	    {
	        "drawid": "26",
	        "number": "A0045",
	        "uid": "0000000149",
	        "realname": "赵淑琴",
	        "realidentity": "410103195109301928",
	        "utel": "13721444002",
	        "level": "1",
	        "period": "1"
	    },
	    {
	        "drawid": "27",
	        "number": "A0104",
	        "uid": "0000000188",
	        "realname": "卢官程",
	        "realidentity": "230103196312254216",
	        "utel": "19946133441",
	        "level": "1",
	        "period": "1"
	    },
		...
	]

## 39、通过uid和上传的图片进行实名认证（新）
     
### 请求URL：
	http://www.equnshang.com/handlers/checkIdCard1.php

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
	    "status":"OK",  //成功
	    "used"：0, //身份证没有实名认证过
	    "data": {
                "uid": "187",
                "name": "杨彪",
                "num": "430122199101270013",
                "address": "湖南省望城县乔口镇湛水村熊家湾组112号",
                "sex": 0,
                "birth": "19910127",
                "nationality": "汉"
        }
	}
	{
	    "status":"OK",  //成功
        "used"：1 //身份证已经实名认证过
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
    
## 40、实名认证
     
### 请求URL：
	http://www.equnshang.com/handlers/doRealname.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
    |name       |Y          |String      |实名制姓名
    |num        |Y          |String      |实名制身份证号码
    |address    |Y          |String      |实名制身份证地址
    |sex        |Y          |int         |实名制性别
    |birth      |Y          |string      |实名制生日
    |nationality|Y          |string      |实名制民族
	

### 返回示例： 
	{
	    "status":"OK",  //成功
	}
	{
	    "status":"Fail",  //失败
        "errMes"：DataBase fail. //存入数据库失败
	}
	
## 41、根据Uid和videoid进行点赞
     
### 请求URL：
	http://www.equnshang.com/handlers/dozan.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID
    |videoid    |Y          |String      |视频id

### 返回示例： 
	{
	    "statusCode": 0,
	    "Msg": "今天点过赞了"
	}
	{
	    "statusCode": 1,
	    "zancount": "1"//当前视频点赞数
	}
	
## 42、根据Uid获得关注的人的信息列表
     
### 请求URL：
	http://www.equnshang.com/handlers/focususerlist.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID

### 返回示例： 
	[
	    {
	        "uid": "0000000001",
	        "uname": "CEO",
	        "headimage": "http:\/\/www.equnshang.com\/headimg\/1603965457806_mmexport1603960831264.png",
	        "introduce": ""
	    },
	    {
	        "uid": "0000000011",
	        "uname": "kot",
	        "headimage": "http:\/\/www.equnshang.com\/headimg\/1604368971669_1604137199-IMG_0182.JPG",
	        "introduce": "hhhhhh"
	    }
	]

## 43、根据parentid获得下一级地址列表
     
### 请求URL：
	http://www.equnshang.com/handlers/findregionarr.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |parentid   |Y          |String      |父地址id

### 返回示例： 
	[
	    {
	        "cityid": "2703",
	        "cityparentid": "321",
	        "cityname": "长宁区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2704",
	        "cityparentid": "321",
	        "cityname": "闸北区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2705",
	        "cityparentid": "321",
	        "cityname": "闵行区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2706",
	        "cityparentid": "321",
	        "cityname": "徐汇区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2707",
	        "cityparentid": "321",
	        "cityname": "浦东新区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2708",
	        "cityparentid": "321",
	        "cityname": "杨浦区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2709",
	        "cityparentid": "321",
	        "cityname": "普陀区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2710",
	        "cityparentid": "321",
	        "cityname": "静安区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2711",
	        "cityparentid": "321",
	        "cityname": "卢湾区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2712",
	        "cityparentid": "321",
	        "cityname": "虹口区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2713",
	        "cityparentid": "321",
	        "cityname": "黄浦区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2714",
	        "cityparentid": "321",
	        "cityname": "南汇区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2715",
	        "cityparentid": "321",
	        "cityname": "松江区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2716",
	        "cityparentid": "321",
	        "cityname": "嘉定区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2717",
	        "cityparentid": "321",
	        "cityname": "宝山区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2718",
	        "cityparentid": "321",
	        "cityname": "青浦区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2719",
	        "cityparentid": "321",
	        "cityname": "金山区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2720",
	        "cityparentid": "321",
	        "cityname": "奉贤区",
	        "citytype": "3"
	    },
	    {
	        "cityid": "2721",
	        "cityparentid": "321",
	        "cityname": "崇明县",
	        "citytype": "3"
	    }
	]

## 44、根据uid获得该用户的默认收货地址信息
     
### 请求URL：
	http://www.equnshang.com/handlers/finddefultaddress.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
    |uid        |Y          |String      |当前用户ID

### 返回示例： 
	{
		"urealname":"aaa",
		"utel":"123",
		"realaddress":".."
	}

## 45、返回新成为粉丝的前三名用户
     
### 请求URL：
	http://www.equnshang.com/handlers/newidentitydata.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	    |是否必选    |类型        |说明
   

### 返回示例： 
	[
	    {
	        "headimage": "http:\/\/www.equnshang.com\/headimg\/default.jpg",
	        "uname": "用户915",
	        "identity": "0",
	        "regtime": "2020-11-25 14:17:05"
	    },
	    {
	        "headimage": "http:\/\/www.equnshang.com\/headimg\/default.jpg",
	        "uname": "用户418",
	        "identity": "0",
	        "regtime": "2020-11-25 11:57:40"
	    },
	    {
	        "headimage": "http:\/\/www.equnshang.com\/headimg\/default.jpg",
	        "uname": "用户880",
	        "identity": "0",
	        "regtime": "2020-11-25 11:57:32"
	    }
	]
	
## 46、根据从订单id和uid增加消费行为
     
### 请求URL：
	http://www.equnshang.com/handlers/consumptioncredit.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选     |类型        |说明
    |uid         |Y           |String      |当前用户ID
	|minororderid|Y           |String      |从订单id

### 返回示例： 
	{
		"statusCode":1 //成功
	}

## 47、通过uid插入合伙人表新信息
     
### 请求URL：
	http://www.equnshang.com/handlers/updatepartner.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选     |类型        |说明
    |uid         |Y           |String      |当前用户ID

### 返回示例： 
	{
		"statusCode":1 //成功
	}

## 48、通过uid和订单项id计算合伙人收益并且创建会员用户信息
     
### 请求URL：
	http://www.equnshang.com/handlers/vipdeservedsum.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选     |类型        |说明
    |uid         |Y           |String      |当前用户ID
	|orderitemid |Y           |String      |当前用户ID

### 返回示例： 
	无返回

## 49、通过uid获得今天，昨天，本周，上月，本月数据
     
### 请求URL：
	http://www.equnshang.com/handlers/moneysourcedata.php

### 示例：
无

### 请求方式：
	POST

### 参数类型：param

	|参数	     |是否必选     |类型        |说明
    |uid         |Y           |String      |当前用户ID

### 返回示例： 
	[
	    {
	        "today": [
	            {
	                "sumcredit": "2816.6",
	                "avercredit": 910.46,
	                "todayprearr": [
	                    {
	                        "name": "短视频喜欢",
	                        "number": "3.00"
	                    },
	                    {
	                        "name": "浏览视频",
	                        "number": "665.40"
	                    },
	                    {
	                        "name": "短视频点赞",
	                        "number": "14.60"
	                    },
	                    {
	                        "name": "短视频评论",
	                        "number": "15.00"
	                    },
	                    {
	                        "name": "拉新",
	                        "number": "200.00"
	                    }
	                ],
	                "lastfivedayarr": [
	                    {
	                        "number": "1854.50",
	                        "day": "11-28"
	                    },
	                    {
	                        "number": "3231.90",
	                        "day": "11-29"
	                    },
	                    {
	                        "number": "1304.10",
	                        "day": "11-30"
	                    },
	                    {
	                        "number": "1008.30",
	                        "day": "12-01"
	                    },
	                    {
	                        "number": "898.00",
	                        "day": "12-02"
	                    }
	                ]
	            }
	        ],
	        "yesterday": {
	            "yserterdayarr": [
	                {
	                    "name": "短视频喜欢",
	                    "number": "0.60"
	                },
	                {
	                    "name": "浏览视频",
	                    "number": "680.70"
	                },
	                {
	                    "name": "短视频点赞",
	                    "number": "11.00"
	                },
	                {
	                    "name": "短视频评论",
	                    "number": "16.00"
	                },
	                {
	                    "name": "拉新",
	                    "number": "300.00"
	                }
	            ]
	        },
	        "lastweek": {
	            "lastweekarr": [
	                {
	                    "name": "短视频喜欢",
	                    "number": "6.40"
	                },
	                {
	                    "name": "浏览视频",
	                    "number": "3416.70"
	                },
	                {
	                    "name": "短视频点赞",
	                    "number": "49.20"
	                },
	                {
	                    "name": "短视频评论",
	                    "number": "70.00"
	                },
	                {
	                    "name": "拉新",
	                    "number": "2900.00"
	                }
	            ]
	        },
	        "thismonth": {
	            "thismontharr": [
	                {
	                    "name": "短视频喜欢",
	                    "number": "3.60"
	                },
	                {
	                    "name": "浏览视频",
	                    "number": "1346.10"
	                },
	                {
	                    "name": "短视频点赞",
	                    "number": "25.60"
	                },
	                {
	                    "name": "短视频评论",
	                    "number": "31.00"
	                },
	                {
	                    "name": "拉新",
	                    "number": "500.00"
	                }
	            ]
	        },
	        "lastmonth": {
	            "lastmontharr": [
	                {
	                    "name": "短视频喜欢",
	                    "number": "32.40"
	                },
	                {
	                    "name": "浏览视频",
	                    "number": "22412.40"
	                },
	                {
	                    "name": "短视频点赞",
	                    "number": "81.00"
	                },
	                {
	                    "name": "短视频评论",
	                    "number": "47.00"
	                },
	                {
	                    "name": "拉新",
	                    "number": "13300.00"
	                },
	                {
	                    "name": "兑换群币",
	                    "number": "-30000.00"
	                }
	            ]
	        }
	    }
	]