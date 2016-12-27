<?php
namespace Member\Controller;

use System\Classes\Controller;
use Common\Controller\JsonApiController;
use System\View\EmptyView;
use System\Classes\CommandBus;
use System\Interfaces\ICommand;
use Marmot\Core;

use Member\Model\Account;
use Member\View\AccountView;

class AccountController extends Controller
{
    use JsonApiController;

    /**
     * 对应路由 /accounts/source/{source:\d+}/id/{id}
     * GET方法传参
     * 根据接口获取用户信息
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(int $source, $id)
    {
        //初始化仓库
        $repository = Core::$container->make('Member\Repository\Account\AccountRepository', ['source'=>$source]);

        if (!empty($source) && !empty($id)) {
            $account = $repository->getOne($id);
            if ($account instanceof Account) {
                $this->render(new AccountView($account));
                return true;
            }
        }

        $this->getResponse()->setStatusCode(404);
        $this->render(new EmptyView());
        return false;
    }

    /**
     * 对应路由 /accounts/source/{source:\d+}/id/{id}/pay
     * POST方法传参
     * 根据接口获取用户信息
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function pay(int $source, $id)
    {
        $data = $this->getRequest()->post('data');

        if (!empty($source) && !empty($id) && $data['type'] == 'accounts') {
            //初始化仓库
            $repository = Core::$container->make('Member\Repository\Account\AccountRepository', ['source'=>$source]);

            $result = $repository->pay($id, $data['attributes']['money']);
            if ($result) {
                $this->getResponse()->setStatusCode(204);
                $this->render(new EmptyView());
                return false;
            }
        }

        $this->getResponse()->setStatusCode(404);
        $this->render(new EmptyView());
        return false;
    }
}
