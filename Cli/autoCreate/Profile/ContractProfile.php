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
	'className' => 'Contract',
	'nameSpace' => 'Contract\Model',
	'comment' => '合同领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'合同id'],
					 ['key'=>'shop','type'=>'Shop','rule'=>'object','default'=>'','comment'=>'合同所属店铺'],
					 ['key'=>'title','type'=>'string','rule'=>'string','default'=>'','comment'=>'合同标题'],
					 ['key'=>'content','type'=>'ContractContent','rule'=>'object','defualt'=>'new ContractContent()','comment'=>'合同内容'],
					 ['key'=>'status','type'=>'int','rule'=>['STATUS_NORMAL','STATUS_DELETE'],'default'=>'STATUS_NORMAL','comment'=>'合同状态']
					]
];
