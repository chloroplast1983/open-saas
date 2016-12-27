<?php
namespace Member\View;

use Member\Model\Account;
use Common\View\JsonApiView;
use System\Interfaces\IView;

/**
 * @codeCoverageIgnore
 */
class AccountView implements IView
{
   
    use JsonApiView;

    private $rules;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;

        $this->rules = array(
            Account::class => AccountSchema::class
         );
    }

    public function display()
    {
        return $this->jsonApiFormat($this->data, $this->rules);
    }
}
