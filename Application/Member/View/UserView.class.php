<?php
namespace Member\View;

use Common\View\JsonApiView;
use System\Interfaces\IView;

use Member\Model\User;

/**
 * @codeCoverageIgnore
 */
class UserView implements IView
{
   
    use JsonApiView;

    private $rules;

    private $data;

    public function __construct($data)
    {
        //判断data是否合法
        //单个是否为对象,多个是否为数组的对象
        $this->data = $data;
        $this->rules = array(
            User::class => UserSchema::class
        );
    }

    public function display()
    {
        return $this->jsonApiFormat($this->data, $this->rules);
    }
}
