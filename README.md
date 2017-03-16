###目录

* [简介](#abstract) 
* [项目字典](#dictionary)
* [版本记录](#version)

###[简介](id:abstract)

---

`open`服务主要是用于解耦所有第三方接口设置.

第三方接口微服务,现在包含:

* 获取用户信息接口
* 获取用户账户(余额)接口
* 从用户账户扣费接口

###[项目字典](id:dictionary)

---

####用户(User)

#####id

**用户第三方唯一标示** 用户来自第三方的唯一标示,这里考虑是来自第三方,所以没有严格限制具体类型.

#####cellPhone

**用户手机** 用户手机号. 

#####nickName

**昵称** 用户的昵称.

#####userName

**用户名** 用户来自第三方的用户名.

#####realName

**真实姓名** 用户真实姓名.暂时我方还没有存储使用该字段.

#####source

**来源**

* `USER_SOURCE_QIDE` 启德

####微信(weixin)

#####unionId

**微信`unionId`**

####账户(Account)

#####balance 

**余额** 用户账户余额

#####exchangeRate

**汇率** 用户账户(第三方)针对我方的汇率

###[版本记录](id:version)

---

* [0.1](./Docs/version/0.1.md "0.1")
	* [0.1.1](./Docs/version/0.1.1.md "0.1.1")
	* [0.1.2](./Docs/version/0.1.2.md "0.1.2")
	* [0.1.3](./Docs/version/0.1.3.md "0.1.3")
