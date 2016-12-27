<?php
namespace Member\Model;

/**
 * Account 用户第三方账户
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class Account
{

    /**
     * @var User $user 用户
     */
    private $user;
    /**
     * @var int $balance 用户账户余额
     */
    private $balance;
    /**
     * @var float $exchangeRate 汇率
     */
    private $exchangeRate;


    /**
     * Account 用户账户 构造函数
     */
    public function __construct(User $user, float $exchangeRate)
    {
        $this->user = $user;
        $this->balance = 0;
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Account 用户账户 析构函数
     */
    public function __destruct()
    {
        unset($this->user);
        unset($this->balance);
        unset($this->exchangeRate);
    }

    /**
     * 设置账户id
     * @param $id 账户id
     */
    public function setId($id)
    {
        $this->user->setId($id);
    }

    /**
     * 获取账户id
     * @return $id 账户id
     */
    public function getId()
    {
        return $this->user->getId();
    }
    
    /**
     * 设置账户所属用户
     * @param User $user 账户所属用户
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取账户用户
     * @return User $user 账户所属用户
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * 设置用户账户余额
     * @param Account $balance 用户账户余额
     */
    public function setBalance(float $balance)
    {
        $this->balance = $balance;
    }

    /**
     * 获取用户账户余额
     * @return Account $balance 用户账户余额
     */
    public function getBalance() : float
    {
        return $this->balance;
    }

    /**
     * 设置汇率
     * @param float $exchangeRate 汇率
     */
    public function setExchangeRate(float $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * 获取汇率
     * @return float $exchangeRate
     */
    public function getExchangeRate() : float
    {
        return $this->exchangeRate;
    }
}
