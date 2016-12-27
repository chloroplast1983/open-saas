<?php
namespace Member\Model;

class User
{
    /**
     * @var string $id 第三方用户id
     */
    private $id;
    /**
     * @var string $cellPhone 用户手机号
     */
    private $cellPhone;
    /**
     * @var string $nickName 昵称
     */
    private $nickName;
    /**
     * @var string $userName 用户名预留字段
     */
    private $userName;
    /**
     * @var string $realName  真实姓名
     */
    private $realName;
    /**
     * @var Weixin $weixin 微信
     */
    private $weixin;
    /**
     * @var int $source 来源
     */
    private $source;

    public function __construct($id = '')
    {
        $this->id = $id;
        $this->realName = '';
        $this->cellPhone = '';
        $this->nickName = '';
        $this->userName = '';
        $this->weixin = new Weixin();
        $this->source = 0;
    }

    public function __destruct()
    {
        unset($this->id);
        unset($this->realName);
        unset($this->cellPhone);
        unset($this->nickName);
        unset($this->userName);
        unset($this->weixin);
        unset($this->source);
    }

    /**
     * 设置用户第三方 id
     * @param string 第三方 $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * 获取用户第三方 id
     * @param string 第三方 $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置用户来源
     * @param int $source
     */
    public function setSource(int $source)
    {
        $this->source = $source;
    }

    /**
     * 返回用户来源
     * @return int $source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * 设置用户手机号码
     * @param string $cellPhone
     */
    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = is_numeric($cellPhone) ? $cellPhone : '';
    }

    /**
     * Gets the value of cellPhone.
     *
     * @return string $cellPhone 用户名,现在用手机号
     */
    public function getCellPhone() : string
    {
        return $this->cellPhone;
    }

    /**
     * 设置昵称
     * @param string $nickName 昵称
     */
    public function setNickName(string $nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * 获取昵称
     * @return string $nickName 昵称
     */
    public function getNickName() : string
    {
        return $this->nickName;
    }

    /**
     * 设置用户名预留字段
     * @param string $userName 用户名预留字段
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * 获取用户名预留字段
     * @return string $userName 用户名预留字段
     */
    public function getUserName() : string
    {
        return $this->userName;
    }

    /**
     * 设置用户的真实姓名
     * @param string $realName
     */
    public function setRealName(string $realName)
    {
        $this->realName = $realName;
    }

    /**
     * 返回用户的真实姓名
     * @return string $realName
     */
    public function getRealName() : string
    {
        return $this->realName;
    }

    /**
     * 设置微信账户
     * @param Weixin $weixin
     */
    public function setWeixin(Weixin $weixin)
    {
        $this->weixin = $weixin;
    }

    /**
     * 返回微信账户
     * @return Weixin weixin
     */
    public function getWeixin() : Weixin
    {
        return $this->weixin;
    }
}
