<?php
namespace Member\Translator;

use System\Classes\Translator;
use Member\Model\User;
use Member\Model\Weixin;

class QiDeUserTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $user = new User($expression['UId']);

        $user->setCellPhone($expression['Phone']);
        $user->setNickName($expression['NickName']);
        $user->setRealName($expression['RealName']);
        $user->setWeixin(new Weixin($expression['UnionId']));
        $user->setSource(USER_SOURCE_QIDE);
        return $user;
    }

    public function objectToArray($user, array $keys = array())
    {
        return [];
    }
}
