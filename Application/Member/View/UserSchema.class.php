<?php
namespace Member\View;

use Neomerx\JsonApi\Schema\SchemaProvider;
use Member\Model\User;

/**
 * @codeCoverageIgnore
 */
class UserSchema extends SchemaProvider
{
    protected $resourceType = 'users';

    public function getId($user)
    {
        return $user->getId();
    }

    public function getSelfSubLink($user)
    {
        return $this->createLink(
            '/users/'.$user->getSource().'/'.$user->getId()
        );
    }

    public function getAttributes($user) : array
    {
        return [
            'cellPhone'  => $user->getCellPhone(),
            'realName'  => $user->getRealName(),
            'userName' => $user->getUserName(),
            'nickName' => $user->getNickName(),
            'unionId' => $user->getWeixin()->getUnionId(),
            'source' => $user->getSource()
        ];
    }
}
