<?php

/**
 * 支持rule: 
 * 1.cellPhone: 手机
 * 2.qq: QQ号码
 * 3.email: 邮箱
 * 4.time: 时间
 * 5.数组: 状态码
 * 6.object: 对象
 */

return [
	'className' => 'Shop',
	'nameSpace' => 'Shop\Model',
	'comment' => '用户领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'店铺id'],
				     ['key'=>'user','type'=>'User','rule'=>'object','defualt'=>'','comment'=>'店铺所属用户'],
					 ['key'=>'title','type'=>'string','rule'=>'string','default'=>'','comment'=>'店铺标题'],
					 ['key'=>'contactPeople','type'=>'string','rule'=>'string','default'=>'','comment'=>'联系人'],
					 ['key'=>'contactPeoplePhone','type'=>'string','rule'=>'string','default'=>'','comment'=>'联系人电话'],
					 ['key'=>'contactPeopleQQ','type'=>'string','rule'=>'string','default'=>'','comment'=>'联系人QQ'],
					 ['key'=>'province','type'=>'int','rule'=>'int','default'=>0,'comment'=>'店铺所在省'],
					 ['key'=>'city','type'=>'int','rule'=>'int','default'=>0,'comment'=>'店铺所在市'],
					 ['key'=>'address','type'=>'string','rule'=>'string','default'=>'','comment'=>'店铺地址'],
					 ['key'=>'aboutInfo','type'=>'ShopAboutInfo','rule'=>'object','defualt'=>'','comment'=>'店铺关于我们'],
					 ['key'=>'slides','type'=>'ShopSlides','rule'=>'object','defualt'=>'','comment'=>'店铺幻灯片'],
					 ['key'=>'navigation','type'=>'ShopNavigation','rule'=>'object','defualt'=>'','comment'=>'店铺导航'],
					]
];
