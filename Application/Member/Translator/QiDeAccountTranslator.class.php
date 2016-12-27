<?php
namespace Member\Translator;

use System\Classes\Translator;

use Member\Model\Account;
use Member\Model\User;
use Marmot\Core;

class QiDeAccountTranslator extends Translator
{

    public function arrayToObject(array $expression, array $keys = array())
    {

        $account = new Account(new User(), Core::$container->get('open.qide.rate'));
        $account->setBalance($expression['HaiMiBalance']);
        $account->getUser()->setSource(USER_SOURCE_QIDE);
        
        return $account;
    }

    public function objectToArray($account, array $keys = array())
    {
    }
}
