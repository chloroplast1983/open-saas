node {
    stage '检出最新代码'
    git([credentialsId: '576f44ca-5da6-4dba-9e3f-a618ceab2623', url: 'https://github.com/chloroplast1983/saas-open', branch: 'master'])
    echo 'checkout success'
    stage '初始化环境'
    dir('deployment/test') {
        sh 'sudo docker-compose -p saas-open-test stop'
        sh 'sudo docker-compose -p saas-open-test rm -v -f'
        sh 'sudo docker login --username=电商湾 --password=Cmu7yJ69hx5VWnu8 --email=41893204@qq.com registry-internal.cn-hangzhou.aliyuncs.com'
        sh 'sudo docker pull registry-internal.cn-hangzhou.aliyuncs.com/saas/saas-open'
        sh 'sudo docker-compose -p saas-open-test up -d'
    }
    stage '代码规范检测'
    sh 'sudo docker exec saas-open-phpfpm vendor/bin/phpcs'
    stage '代码复制黏贴检测'
    sh 'sudo docker exec saas-open-phpfpm vendor/bin/phpcpd ./Application'
    stage '单元测试'
    sh 'sudo docker exec saas-open-phpfpm vendor/bin/phpunit'
    stage '发布候选版本'
    //
    sh 'sudo docker login --username=电商湾 --password=Cmu7yJ69hx5VWnu8 --email=41893204@qq.com registry-internal.cn-hangzhou.aliyuncs.com'
    sh 'sudo docker tag $(sudo docker images |grep \'registry-internal.cn-hangzhou.aliyuncs.com/saas/saas-open\'|grep \'latest\'|awk \'{print $3}\') registry-internal.cn-hangzhou.aliyuncs.com/saas/saas-open:$(cat ./VERSION)'
    sh 'sudo docker push registry-internal.cn-hangzhou.aliyuncs.com/saas/saas-open:$(cat ./VERSION)'
    stage '清理环境'
    dir('deployment/test') {
        sh 'sudo docker-compose -p saas-open-test stop'
        sh 'sudo docker-compose -p saas-open-test rm -v -f'
    }
    stage '部署沙箱'
    sh 'sed -i "s/VERSION/$(cat VERSION)/g" deployment/sandbox/docker-compose.yml'
    dir('deployment/sandbox') {
        sh 'rancher-compose --url ${RANCHER_URL} --access-key ${RANCHER_SANDBOX_ACCESS_KEY} --secret-key ${RANCHER_SANDBOX_SECRET_KEY} --verbose -p saas-open up -d --upgrade --confirm-upgrade service'
    }
    echo 'release sandbox success'
    stage '部署生产'
    sh 'echo $datacontainer'
    timeout(time:2, unit:'DAYS') {
        input message:'Release Production ?', ok: 'Release'
    }
    sh 'sed -i "s/VERSION/$(cat VERSION)/g" deployment/production/docker-compose.yml'
    dir('deployment/production') {
        sh 'rancher-compose --url ${RANCHER_URL} --access-key ${RANCHER_PRODUCTION_ACCESS_KEY} --secret-key ${RANCHER_PRODUCTION_SECRET_KEY} --verbose -p saas-open up -d --upgrade --batch-size 2 --interval "30000" --confirm-upgrade service'
    }
    echo 'release production success'
}
