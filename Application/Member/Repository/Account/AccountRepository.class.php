<?php
namespace Member\Repository\Account;

use Member\Model\Account;
use Marmot\Core;
use Member\Adapter\AdapterFactory;
use Member\Adapter\IUserTradeAdapter;

/**
 * 用户仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class AccountRepository
{

    private $adapter;

    public function __construct(int $source)
    {
        $adapterFactory = new AdapterFactory();

        $this->adapter = $adapterFactory->getAdapter($source);
    }

    /**
     * 获取用户账户
     * @param $id 用户id
     */
    public function getOne($id)
    {
        if (!$this->adapter instanceof IUserTradeAdapter) {
            return false;
        }

        $account = $this->adapter->getBalance($id);
        if (!$account instanceof Account) {
            return false;
        }
        return $account;
    }

    /**
     * 支付
     * @param $id 用户id
     * @param $money 支付金额
     */
    public function pay($id, $money)
    {
        if (!$this->adapter instanceof IUserTradeAdapter) {
            return false;
        }
        return $this->adapter->pay($id, $money);
    }
}
