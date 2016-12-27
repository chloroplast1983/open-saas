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
	'className' => 'ShopSlies',
	'nameSpace' => 'Shop\Model',
	'comment' => '店铺幻灯片',
	'parameters' => [
					['key'=>'mongoId','type'=>'string','rule'=>'string','default'=>'','comment'=>'存储 Mongo id'],
				    ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'创建时间'],
					]
];
