use saas_project_test;

CREATE TABLE `pcore_project` (
  `project_id` int(10) NOT NULL COMMENT '项目主键id',
  `name` varchar(255) NOT NULL COMMENT '项目名称',
  `feature` text NOT NULL COMMENT '项目特色',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL COMMENT '(PROJECT_STATUS_NORMAL,撤销,0),(PROJECT_STATUS_PUBLISH,发布状态,2),(PROJECT_STATUS_DELETE,删除,-2)',
  `category` tinyint(1) NOT NULL COMMENT '(PROJECT_CATEGORY_INVEST,基金项目,1),(PROJECT_CATEGORY_FINACE,融资项目,2)',
  `status_time` int(10) NOT NULL COMMENT '状态更新时间',
  `user_id` int(10) NOT NULL COMMENT 'saas用户id,等同于店铺id',
  `logo` varchar(255) NOT NULL COMMENT 'logo图片id',
  `min_price` decimal(10,0) NOT NULL COMMENT '最低价',
  `max_price` decimal(10,0) NOT NULL COMMENT '最高价',
  `description` char(24) NOT NULL COMMENT '项目描述mongo_id',
  `prices` char(24) NOT NULL COMMENT '项目价格mongo_id',
  `slides` char(24) NOT NULL COMMENT '幻灯片mongo_id',
  `apply_count` int(10) NOT NULL COMMENT '申请人数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目表';

ALTER TABLE `pcore_project`
  ADD PRIMARY KEY (`project_id`);

ALTER TABLE `pcore_project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '项目主键id', AUTO_INCREMENT=1;

CREATE TABLE `pcore_application` (
  `application_id` int(10) NOT NULL COMMENT '申请主键id',
  `apply_user_real_name` varchar(255) NOT NULL COMMENT '申请用户真实姓名',
  `apply_user_contact_phone` varchar(255) NOT NULL COMMENT '申请用户联系电话',
  `apply_user_identify_card_number` varchar(255) NOT NULL COMMENT '申请用户身份证号',
  `apply_user_company_name` varchar(255) NOT NULL COMMENT '申请用户企业名称',
  `apply_user_company_address` varchar(255) NOT NULL COMMENT '申请用户企业地址',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL COMMENT '(APPLICATION_STATUS_NORMAL,在线磋商,0),(APPLICATION_STATUS_PENDING,等待结果,2),(APPLICATION_STATUS_DECLINE,拒绝,4),(APPLICATION_STATUS_APPROVE,批准,6)',
  `status_time` int(10) NOT NULL COMMENT '状态更新时间',
  `user_id` int(10) NOT NULL COMMENT '所属用户id',
  `project_price_index` int(10) NOT NULL COMMENT '项目价格索引',
  `project_id` int(10) NOT NULL COMMENT '项目id',
  `project_user_id` int(10) NOT NULL COMMENT 'project 用户id,冗余字段,便于搜索,违反第三范式',
  `information` char(24) NOT NULL COMMENT '申请信息mongo_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目申请表';

ALTER TABLE `pcore_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_user_id` (`project_user_id`);

ALTER TABLE `pcore_application`
  MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '申请主键id';

CREATE TABLE `pcore_reply` (
  `reply_id` int(10) NOT NULL COMMENT '回复主键id',
  `user_id` int(10) NOT NULL COMMENT '回复所属saas用户id',
  `application_id` int(10) NOT NULL COMMENT '申请主键id',
  `content` char(24) NOT NULL COMMENT 'content mongoId',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `status_time` int(10) NOT NULL COMMENT '状态变更时间',
  `status` tinyint(1) NOT NULL COMMENT '状态,预留',
  `update_time` int(10) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='申请回复表';

ALTER TABLE `pcore_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `application_id` (`application_id`);

ALTER TABLE `pcore_reply`
  MODIFY `reply_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '回复主键id';