<?php
namespace Member\Controller;

use System\Classes\Controller;
use Common\Controller\JsonApiController;
use System\View\EmptyView;
use System\Classes\CommandBus;
use System\Interfaces\ICommand;
use Marmot\Core;

use Member\Model\User;
use Member\View\UserView;

class UserController extends Controller
{
    use JsonApiController;

    /**
     * 对应路由 /users/source/{source:\d+}/id/{id}
     * GET方法传参
     * 根据接口获取用户信息
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(int $source, $id)
    {
        //初始化仓库
        $repository = Core::$container->make('Member\Repository\User\UserRepository', ['source'=>$source]);

        if (!empty($source) && !empty($id)) {
            $user = $repository->getOne($id);
            if ($user instanceof User) {
                $this->render(new UserView($user));
                return true;
            }
        }

        $this->getResponse()->setStatusCode(404);
        $this->render(new EmptyView());
        return false;
    }
}
