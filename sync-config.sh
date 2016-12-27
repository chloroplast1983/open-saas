#!/bin/bash
if [ $1 == "sandbox" ]
then
	confd -confdir="conf/sandbox" -onetime -backend etcd -node http://etcd.etcd-ha:2379
	echo "conf sandbox done"
fi
if [ $1 == "production" ]
then
	confd -confdir="conf/production" -onetime -backend etcd -node http://etcd.etcd-ha:2379
	echo "conf production done"
fi