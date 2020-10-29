头像：
http://pic.51yuansu.com/pic2/cover/00/27/31/57fd98ab8e47b_610.jpg
http://5b0988e595225.cdn.sohucs.com/q_70,c_zoom,w_640/images/20190115/87868f21befc4e7f9007aa71efa79621.jpeg

### 群商数据库的创建

```sql
create database db_qunshang
default character set utf8
default collate utf8_general_ci;
use db_qunshang;
```
### 用户模块
#### 创建用户表tbl_user
```sql
create  table tbl_user(
uid int(10) unsigned zerofill not null auto_increment comment  '用户编号',
utel char(11) not null comment '用户手机号',
upass varchar(32) not null comment '密码',
uname char(10) not null comment '用户名',
headimage varchar(255) not null comment '头像',
gender tinyint not null comment '性别',
introduce varchar(50) default '暂无签名' not null comment '简介',
identity tinyint not null comment '身份',
preidentity tinyint not null comment '预定身份',
regtime timestamp not null default  current_timestamp comment '注册时间',
invitecode char(10) not null default 0 comment '邀请码',
inviteid int(10) not null comment '邀请人',
invitenum int not null comment '邀请人数',
credit double not null default 0  comment '行为积分',
wallet double not null default 0  comment '礼物钱包',
address varchar(50) not null comment  '默认收获地址',
partnerid int(10) unsigned zerofill not null comment '合伙人id',
quncoin int not null default 0 comment '群币',
primary key (uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建行为积分表tbl_behaviorcredit
```sql
create  table tbl_behaviorcredit(
creditid bigint not null auto_increment comment  '行为积分编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
behavior tinyint not null comment '行为',
getcredit double not null comment '获得积分',
gettime timestamp not null default current_timestamp comment '获取时间',
primary key (creditid),
foreign key(uid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建社群主类表tbl_groupclass
```sql
create  table tbl_groupclass(
groupclassid int not null auto_increment comment  '社群主类编号',
groupclassname char(10) not null comment '社群主类名称',
primary key (groupclassid)
)engine=InnoDB  default charset=utf8;
```

#### 创建社群子类表tbl_groupclasschild
```sql
create  table tbl_groupclasschild(
groupclasschildid int unsigned not null auto_increment comment  '社群子类编号',
groupclasschildname char(10) not null comment '社群子类名称',
groupclassid int not null comment  '社群主类编号',
primary key (groupclasschildid),
foreign  key(groupclassid) references tbl_groupclass(groupclassid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建社群表tbl_group
```sql
create  table tbl_group(
groupid smallint unsigned not null auto_increment comment  '社群编号',
groupname char(10) not null comment '社群名',
uid int(10) unsigned zerofill not null comment  '群主编号',
groupclassid int not null comment '社群类别',
establishtime timestamp not null default current_timestamp comment '成立时间',
primary key (groupid),
foreign  key(groupclassid) references tbl_groupclass(groupclassid) ,
foreign  key(uid) references tbl_user(uid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建用户社群表tbl_useringroup
```sql
create  table tbl_useringroup(
useringroupid int unsigned not null auto_increment comment  '用户社群编号',
groupid smallint unsigned not null comment '社群编号',
uid int(10) unsigned zerofill not null comment  '群主编号',
primary key (useringroupid),
foreign  key(uid) references tbl_user(uid) ,
foreign  key(groupid) references tbl_group(groupid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建群商初始社群表tbl_begingroup
```sql
create  table tbl_begingroup(
begingroupid mediumint unsigned not null auto_increment comment  '初始社群编号',
groupid smallint unsigned not null comment '社群编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
primary key (begingroupid),
foreign  key(uid) references tbl_user(uid) ,
foreign  key(groupid) references tbl_group(groupid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建邀请表tbl_invite
```sql
create  table tbl_invite(
inviteid int unsigned not null auto_increment comment  '邀请编号',
invitedid int(10) unsigned zerofill not null comment '被邀请人编号',
inviterid int(10) unsigned zerofill not null comment  '邀请人编号',
primary key (inviteid),
foreign  key(invitedid) references tbl_user(uid) ,
foreign  key(inviterid) references tbl_user(uid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建系统管理员表tbl_admin
```sql
create  table tbl_admin(
adminid int not null auto_increment comment  '系统管理员编号',
adminname char(10) not null comment '管理员用户名',
adminpass char(20) not null comment  '管理员密码',
primary key (adminid)
)engine=InnoDB  default charset=utf8;
```

#### 创建用户实名表tbl_realname
```sql
create  table tbl_realname(
realnameid int unsigned not null auto_increment comment  '用户实名编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
realname char(10) not null comment  '姓名',
realidentity char(18) not null comment  '身份证号',
realaddress varchar(30) not null comment  '用户地址',
realgender tinyint not null comment  '用户性别',
realbirth char(8) not null comment '用户出生日期',
realnation tinyint not null comment  '用户民族',
primary key (realnameid),
foreign  key(uid) references tbl_user(uid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建会员用户情况表tbl_membercase
```sql
create  table tbl_membercase(
caseid int unsigned not null auto_increment comment  '会员用户情况编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
identity tinyint not null comment '身份',
turnintotime timestamp not null default current_timestamp comment '成为时间',
primary key (caseid),
foreign  key(uid) references tbl_user(uid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建公司认证表tbl_companycertification
```sql
create  table tbl_companycertification(
certificationid int not null auto_increment comment  '公司认证编号',
primary key (certificationid),
)engine=InnoDB  default charset=utf8;
```

#### 创建视频表tbl_video
```sql
create table tbl_video(
videoid int unsigned not null auto_increment comment '短视频编号',
url varchar(255) not null comment '短视频地址',
posterurl varchar(255) not null comment '短视频封面地址',
videodesc varchar(50) not null comment '视频描述',
uid int(10) unsigned zerofill not null comment '发布者编号',
uname char(10) not null comment '作者名称',
headimage varchar(255) not null comment '作者头像',
productid int unsigned not null comment '商品编号',
publishtime timestamp not null default current_timestamp comment '发布时间',
zancouont int not null default 0 comment '点赞数';
primary key (videoid),
foreign key(uid) references tbl_user(uid),
foreign key(productid) references tbl_product(productid) 
)engine=InnoDB default charset=utf8;
```

#### 创建视频点赞表tbl_videolike
```sql
create  table tbl_videolike(
likeid int unsigned not null auto_increment comment  '短视频点赞编号',
videoid int unsigned not null comment '短视频编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
liketime timestamp not null default current_timestamp comment '点赞时间',
creditid bigint not null comment '行为积分编号',
primary key (likeid),
foreign  key(uid) references tbl_user(uid),
foreign  key(videoid) references tbl_video(videoid),
foreign  key(creditid) references tbl_behaviorcredit(creditid),
unique(videoid,uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建视频点赞表tbl_videozan
```sql
create  table tbl_videozan(
zanid int unsigned not null auto_increment comment  '短视频点赞编号',
videoid int unsigned not null comment '短视频编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
liketime timestamp not null default current_timestamp comment '点赞时间',
primary key (zanid),
foreign  key(uid) references tbl_user(uid),
foreign  key(videoid) references tbl_video(videoid),
unique(videoid,uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建视频评论表tbl_videoreply
```sql
create  table tbl_videoreply(
replyid int unsigned not null auto_increment comment  '短视频评论编号',
videoid int unsigned not null comment '短视频编号',
replycontent varchar(50) not null comment  '评论内容',
uid int(10) unsigned zerofill not null comment  '用户编号',
headimage varchar(255) not null comment '用户头像',
uname char(10) not null comment '用户名',
likenum int not null default 0 comment '点赞数',
fatherid int unsigned not null comment  '父评论编号',
replytime timestamp not null default current_timestamp comment '评论时间',
primary key (replyid),
foreign  key(uid) references tbl_user(uid) ,
foreign  key(videoid) references tbl_video(videoid) 
)engine=InnoDB  default charset=utf8mb4;
```

####创建视频关注表tbl_videofocus
```sql
create table tbl_videofocus(
focusid int unsigned not null auto_increment comment '短视频评论编号',
followid int(10) unsigned zerofill not null comment '粉丝用户编号',
leadid int(10) unsigned zerofill not null comment '关注用户编号',
primary key (focusid),
foreign key(leadid) references tbl_user(uid),
foreign key(followid) references tbl_user(uid)
)engine=InnoDB default charset=utf8;
```

### 直播模块
#### 创建直播间表tbl_liveroom
```sql
create  table tbl_liveroom(
liveroomid int unsigned not null auto_increment comment  '直播间编号',
url varchar(255) not null comment '直播间地址',
liverid int(10) unsigned zerofill not null comment  '主播编号',
livername char(10) not null comment '主播用户名',
liverheadimage varchar(255) not null comment '主播头像',
livenum int not null default 0 comment  '当前人数',
productidnum varchar(255) not null comment '带货商品id数组',
productnowid int unsigned not null comment  '当前讲解商品id',
productnowurl varchar(255) not null comment '当前讲解商品主图url',
productnowprice int(11) not null default 0 comment  '当前讲解商品价格',
begintime timestamp not null default current_timestamp comment '开始时间',
finishtime timestamp comment '结束时间',
primary key (liveroomid),
foreign key(liverid) references tbl_user(uid),
foreign key(productnowid) references tbl_product(productid)
)engine=InnoDB default charset=utf8;
```

#### 创建直播观众表tbl_liveaudience
```sql
create  table tbl_liveaudience(
liveaudienceid int unsigned not null auto_increment comment  '直播观众编号',
liveroomid int unsigned not null comment  '直播间编号',
uid int(10) unsigned zerofill not null comment  '观众编号',
uname char(10) not null comment '用户名',
headimage varchar(255) not null comment '头像',
primary key (liveaudienceid),
foreign  key(uid) references tbl_user(uid),
foreign  key(liveroomid) references tbl_liveroom(liveroomid)
)engine=InnoDB  default charset=utf8;
```

#### 创建直播礼物表tbl_livegift
```sql
create  table tbl_livegift(
livegiftid int unsigned not null auto_increment comment  '直播礼物编号',
giftname char(10) not null comment  '礼物名称',
giftprice int(11) not null default 0 comment  '礼物价格',
giftimage varchar(255) not null comment '礼物图片',
primary key (livegiftid)
)engine=InnoDB  default charset=utf8;
```

#### 创建直播送礼表tbl_givegift
```sql
create  table tbl_givegift(
givegiftid int unsigned not null auto_increment comment '直播送礼编号',
uid int(10) unsigned zerofill not null comment '用户编号',
uname char(10) not null comment '用户名',
headimage varchar(255) not null comment '用户头像',
liverid int(10) unsigned zerofill not null comment '主播编号',
livername char(10) not null comment '主播用户名',
liverheadimage varchar(255) not null comment '主播头像',
livegiftid int unsigned not null comment '直播礼物编号',
giftnum tinyint not null default 0 comment '礼物数量',
givegifttime timestamp not null default current_timestamp comment '送礼时间',
primary key (givegiftid),
foreign key(uid) references tbl_user(uid),
foreign key(liverid) references tbl_user(uid),
foreign key(livegiftid) references tbl_livegift(livegiftid)
)engine=InnoDB  default charset=utf8;
```

#### 创建直播礼物钱包充值表tbl_giftcharge
```sql
create  table tbl_givecharge(
giftchargeid int unsigned not null auto_increment comment  '礼物充值编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
chargeprice double not null comment  '充值金额',
chargetime timestamp not null default current_timestamp comment '充值时间',
chargeway tinyint not null default 0 comment  '支付方式',
chargenum varchar(50) not null comment  '支付订单流水号',
primary key (giftchargeid),
foreign  key(uid) references tbl_user(uid) 
)engine=InnoDB  default charset=utf8;
```

### 平台收益模块
#### 创建会员费收益表tbl_memberprofit
```sql
create  table tbl_memberprofit(
memberprofitid int unsigned not null auto_increment comment  '会员费收益编号',
memberid int(10) unsigned zerofill not null comment  '会员编号',
upgradeid int(10) unsigned zerofill not null comment  '池主编号',
payfeenum tinyint not null default 0 comment '缴费次数',
settlenum tinyint not null default 0 comment '结算次数',
primary key (memberprofitid),
foreign  key(memberid) references tbl_user(uid) ,
foreign  key(upgradeid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建群商注册费收益表tbl_qsloginprofit
```sql
create  table tbl_qsloginprofit(
qsloginprofitid int unsigned not null auto_increment comment  '群商注册费收益编号',
qunshangid int(10) unsigned zerofill not null comment  '群商编号',
qsprofitfirstid int(10) unsigned zerofill not null comment  '收益群商1编号',
qsprofitsecondid int(10) unsigned zerofill not null comment  '收益群商2编号',
qsprofitthirdid int(10) unsigned zerofill not null comment  '收益群商3编号',
agentid int(10) unsigned zerofill not null comment  '代理商编号',
settlenum tinyint not null default 0 comment '是否结算',
primary key (qsloginprofitid),
foreign  key(qunshangid) references tbl_user(uid),
foreign  key(qsprofitfirstid) references tbl_user(uid),
foreign  key(qsprofitsecondid) references tbl_user(uid),
foreign  key(qsprofitthirdid) references tbl_user(uid),
foreign  key(agentid) references tbl_user(uid)
)engine=InnoDB default charset=utf8;
```
#### 创建群商平台收益表tbl_qsplatformprofit
```sql
create  table tbl_qsplatformprofit(
qsplatformprofitid int unsigned not null auto_increment comment  '群商平台收益编号',
qunshangid int(10) unsigned zerofill not null comment  '群商编号',
minororderid int unsigned not null comment  '订单从表编号',
qsprofitfirstid int(10) unsigned zerofill not null comment  '收益群商1编号',
qsprofitsecondid int(10) unsigned zerofill not null comment  '收益群商2编号',
qsprofitthirdid int(10) unsigned zerofill not null comment  '收益群商3编号',
groupownerid int(10) unsigned zerofill not null comment  '群主编号',
settlenum tinyint not null default 0 comment '是否结算',
primary key (qsplatformprofitid),
foreign  key(qunshangid) references tbl_user(uid) ,
foreign  key(qsprofitfirstid) references tbl_user(uid),
foreign  key(qsprofitsecondid) references tbl_user(uid),
foreign  key(qsprofitthirdid) references tbl_user(uid),
foreign  key(groupownerid) references tbl_user(uid) ,
foreign  key(minororderid) references tbl_minororder(minororderid)
)engine=InnoDB  default charset=utf8;
```

### 商品模块
#### 创建分类父表tbl_productclass
```sql
create  table tbl_productclass(
productclassid tinyint unsigned not null auto_increment comment  '分类父类编号',
classname char(4) not null comment  '分类名称',
classimage varchar(255) not null comment  '分类图标',
classpriority tinyint not null comment '优先级',
primary key (productclassid)
)engine=InnoDB  default charset=utf8;
```

#### 创建分类子表tbl_productclasschild
```sql
create  table tbl_productclasschild(
classchildid tinyint unsigned not null auto_increment comment  '分类子类编号',
productclassid tinyint unsigned not null comment  '分类父类编号',
classchildname char(4) not null comment  '分类名称',
classchildimage varchar(255) not null comment  '分类图标',
classchildpriority tinyint not null comment '优先级',
primary key (classchildid),
foreign  key(productclassid) references tbl_productclass(productclassid)
)engine=InnoDB  default charset=utf8;
```

#### 创建商品表tbl_product
```sql
create  table tbl_product(
productid int unsigned not null auto_increment comment  '商品编号',
productname char(30) not null comment  '商品名称',
productcover varchar(255) not null comment  '商品封面',
productimage text not null comment '商品图片',
introduceimage text not null comment '商品介绍图片',
productnewprice int(11) not null default 0 comment  '商品当前价',
productoldprice int(11) not null default 0 comment  '商品原价',
productdesc varchar(255) not null default '暂无描述' comment  '商品描述',
commissionrate tinyint not null comment  '佣金比例',
sellerid int(10) unsigned zerofill not null comment  '卖家编号',
productstate tinyint not null default 0 comment  '商品状态',
replynum int not null default 0 comment  '评论数',
sellnum int not null default 0 comment  '销量',
freight int not null default 0 comment  '运费',
productaddress char(10) not null default '暂无地址' comment  '商品地址',
classchildid tinyint unsigned not null comment  '所属子分类编号',
shoppingmall tinyint not null default 0 comment  '所属商城',
primary key (productid),
foreign  key(sellerid) references tbl_user(uid),
foreign  key(classchildid) references tbl_productclasschild(classchildid)
)engine=InnoDB  default charset=utf8;
```

#### 创建商品规格表tbl_productspec
```sql
create  table tbl_productspec(
productspecid int unsigned not null auto_increment comment  '商品规格编号',
productid int unsigned not null comment  '商品编号',
productspecdesc char(30) not null default '暂无描述' comment  '规格描述',
storenum int not null default 0 comment  '商品库存',
productoldprice int(11) not null default 0 comment  '商品价格',
primary key (productspecid),
foreign  key(productid) references tbl_product(productid)
)engine=InnoDB  default charset=utf8;
```

#### 创建购物车表tbl_shoppingcart
```sql
create  table tbl_shoppingcart(
cartid int unsigned not null auto_increment comment  '购物车编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
productid int unsigned not null comment  '商品编号',
productimageurl varchar(255) not null comment  '商品主图URL',
productname char(30) not null comment  '商品名称',
productspecid int unsigned not null comment  '商品规格编号',
productspecdesc char(30) not null default '暂无描述' comment  '商品规格描述',
productnum tinyint not null comment  '商品数量',
primary key (cartid),
foreign  key(productid) references tbl_product(productid),
foreign  key(uid) references tbl_user(uid),
foreign  key(productspecid) references tbl_productspec(productspecid)
)engine=InnoDB  default charset=utf8;
```

### 订单模块
#### 创建收获地址表tbl_shippingaddress
```sql
create  table tbl_shippingaddress(
addressid int unsigned not null auto_increment comment  '收货地址编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
defaultaddress tinyint not null comment '是否为默认地址',
urealname char(10) not null comment  '收货人姓名',
utel char(11) not null comment  '手机号',
Realaddress varchar(50) not null comment  '地址',
primary key (addressid),
foreign  key(uid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建订单主表tbl_mainorder
```sql
create  table tbl_mainorder(
mainorderid int unsigned not null auto_increment comment  '订单主表编号',
ordertime timestamp not null default current_timestamp comment '生成时间',
orderstate tinyint not null comment '订单状态',
uid int(10) unsigned zerofill not null comment  '买家编号',
paytime timestamp not null comment '支付时间',
payway tinyint not null comment  '支付方式',
paynum varchar(50) not null comment  '支付订单流水号',
addressid int unsigned not null comment  '收货地址编号',
totalprice int(11) not null comment '总价',
countprice int(11) not null default 0 comment '优惠',
finalprice int(11) not null comment '实付',
primary key (mainorderid),
foreign  key(uid) references tbl_user(uid) ,
foreign  key(addressid) references tbl_shippingaddress(addressid) 
)engine=InnoDB  default charset=utf8;
```

#### 创建订单从表tbl_minororder
```sql
create  table tbl_minororder(
minororderid int unsigned not null auto_increment comment  '订单从表编号',
mainorderid int unsigned not null comment  '订单主表编号',
orderstate tinyint not null comment '订单状态',
sellerid int(10) unsigned zerofill not null comment  '卖家编号',
productprice int(11) not null comment '商品总价',
freight int(11) not null comment '运费',
totalprice int(11) not null comment '总价',
countprice int(11) not null default 0 comment '优惠',
finalprice int(11) not null comment '实付',
logisticsname char(10) not null comment  '物流公司名称',
discuss char(255) not null default "暂无留言" comment '留言',
trackingnum char(15) not null comment  '快递单号',
primary key (minororderid),
foreign  key(mainorderid) references tbl_mainorder(mainorderid) ,
foreign  key(sellerid) references tbl_user(uid)  
)engine=InnoDB  default charset=utf8;
```

#### 创建订单项表tbl_orderitem
```sql
create  table tbl_orderitem(
orderitemid int unsigned not null auto_increment comment  '订单项编号',
minororderid int unsigned not null comment  '订单从表编号',
productname char(30) not null comment '商品名称',
productimage varchar(255) not null comment '商品主图URL',
productid int unsigned not null comment  '商品规格编号',
productintroduce char(30) not null comment '商品规格描述',
preprice int(11) not null default 0 comment '商品单价',
productnum int not null default 0 comment  '商品数量',
commissionrate tinyint not null comment '佣金比例',
primary key (orderitemid),
foreign  key(minororderid) references tbl_minororder(minororderid) ,
foreign  key(productid) references tbl_product(productid)  
)engine=InnoDB  default charset=utf8;
```

####创建订单评论表tbl_orderreply
```sql
create table tbl_orderreply(
orderreplyid int unsigned not null auto_increment comment '订单项编号',
sellerid int(10) unsigned zerofill not null comment '卖家编号',
productid int unsigned not null comment  '商品编号',
uid int(10) unsigned zerofill not null comment '买家编号',
replyattitude tinyint not null comment '评论态度',
replytext char(255) not null default "默认好评" comment '评论文字',
replyimage text comment '评论图片',
replytime timestamp not null default current_timestamp comment '评论时间',
primary key (orderreplyid),
foreign key(sellerid) references tbl_user(uid),
foreign key(productid) references tbl_product(productid),
foreign key(uid) references tbl_user(uid)
)engine=InnoDB default charset=utf8mb4;
```

#### 创建优惠券表tbl_discount
```sql
create  table tbl_discount(
discountid int unsigned not null auto_increment comment  '优惠券编号',
productid int unsigned not null comment  '对应商品编号',
sillprice int(11) not null default 0 comment '门槛金额',
discountprice int(11) not null default 0 comment '优惠金额',
discountnum int not null default 0 comment '优惠券数量',
primary key (discountid),
foreign  key(productid) references tbl_product(productid)  
)engine=InnoDB  default charset=utf8;
```

#### 创建优惠券领取表tbl_discountget
```sql
create  table tbl_discountget(
discountgetid int unsigned not null auto_increment comment  '优惠券领取编号',
discountid int unsigned not null comment  '优惠券编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
primary key (discountgetid),
foreign  key(discountid) references tbl_discount(discountid),
foreign  key(uid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建退货订单表tbl_returnorder
```sql
create  table tbl_returnorder(
returnorderid int unsigned not null auto_increment comment  '退货订单编号',
minororderid int unsigned not null comment  '订单从表编号',
returndesc char(100) not null default '暂无描述' comment  '退货描述',
returnorderstate tinyint not null comment '退货订单状态',
primary key (returnorderid),
foreign  key(minororderid) references tbl_minororder(minororderid)
)engine=InnoDB  default charset=utf8;
```
#### 创建退货物流订单详情表tbl_returnlogistics
```sql
create  table tbl_returnlogistics(
returnlogisticsid int unsigned not null auto_increment comment  '退货物流详情表订单编号',
returnorderid int unsigned not null comment  '退货订单编号',
logisticsname char(10) not null comment  '物流公司名称',
trackingnum char(15) not null comment '快递单号',
primary key (returnlogisticsid),
foreign  key(returnorderid) references tbl_returnorder(returnorderid)
)engine=InnoDB  default charset=utf8;
```

#### 创建省表tbl_province
```sql
create  table tbl_province(
provinceid int not null auto_increment comment  '省编号',
provincename char(5) not null comment  '省名',
primary key (provinceid)
)engine=InnoDB  default charset=utf8;
```

#### 创建市表tbl_city
```sql
create  table tbl_city(
cityid int not null auto_increment comment  '市编号',
cityname char(15) not null comment  '市名',
primary key (cityid)
)engine=InnoDB  default charset=utf8;
```

#### 创建下载表tbl_download
```sql
create table tbl_download(
downid int not null auto_increment comment  '下载编号',
downtime timestamp not null default current_timestamp comment '下载时间',
primary key (downid)
)engine=InnoDB  default charset=utf8;
```

#### 创建抽奖表tbl_lottery
```sql
create table tbl_lottery(
lotteryid int not null auto_increment comment  '抽奖编号',
uid int(10) unsigned zerofill not null comment  '用户编号',
number char(5) not null comment '号码',
period int not null comment '期数',
gettime timestamp not null default current_timestamp comment '获取时间',
drawtime timestamp not null comment '开奖时间',
primary key (lotteryid),
foreign key(uid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```

#### 创建开奖表tbl_drawlottery
```sql
create table tbl_drawlottery(
drawid int not null auto_increment comment  '开奖编号',
number char(5) not null comment '中奖号码',
uid int(10) unsigned zerofill not null comment  '中奖用户编号',
realname char(10) not null comment  '姓名',
realidentity char(18) not null comment  '身份证号',
utel char(11) not null comment  '中奖用户手机号',
level tinyint not null comment '级别',
period int not null comment '期数',
primary key (drawid),
foreign key(uid) references tbl_user(uid)
)engine=InnoDB  default charset=utf8;
```