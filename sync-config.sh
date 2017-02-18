#!/bin/bash
function pingEtcd {
	#尝试ping 2次, 不输出错误信息
	ping -c 2 etcd.etcd-ha > /dev/null 2>&1
	echo $?
}

function syncConfig {
	confd -confdir="$1" -onetime -backend etcd -node http://etcd.etcd-ha:2379
}

#尝试5次
checkTimes=0
while [ `pingEtcd` -ne 0 ]
do
	sleep 1
	let checkTimes++
	
	if [ $checkTimes -gt 5 ]
	then
		echo 'check connection fail!'
		exit 1
	fi
done

#检测没有问题后同步配置文件
if [ $1 == "sandbox" ]
then
	syncConfig "conf/sandbox"
fi

if [ $1 == "production" ]
then
	syncConfig "conf/production"
fi