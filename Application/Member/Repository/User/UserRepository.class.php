<?php
namespace Member\Repository\User;

use Member\Model\User;
use Marmot\Core;
use Member\Adapter\AdapterFactory;
use Member\Adapter\IUserAdapter;

/**
 * 用户仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class UserRepository
{

    private $adapter;

    public function __construct(int $source)
    {
        $adapterFactory = new AdapterFactory();

        $this->adapter = $adapterFactory->getAdapter($source);
    }

    /**
     * 获取用户
     * @param $id 用户id
     */
    public function getOne($id)
    {
        if (!$this->adapter instanceof IUserAdapter) {
            return false;
        }

        $user = $this->adapter->getOne($id);
        if (!$user instanceof User) {
            return false;
        }

        return $user;
    }
}
