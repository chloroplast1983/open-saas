<?php
namespace Member\View;

use Neomerx\JsonApi\Schema\SchemaProvider;
use Member\Model\Account;

/**
 * @codeCoverageIgnore
 */
class AccountSchema extends SchemaProvider
{
    protected $resourceType = 'accounts';

    public function getId($account)
    {
        return $account->getId();
    }

    public function getSelfSubLink($account)
    {
        return $this->createLink(
            '/accounts/source/'.$account->getUser()->getSource().'/id/'.$account->getId()
        );
    }

    public function getAttributes($account) : array
    {
        return [
            'balance'  => $account->getBalance(),
            'exchangeRate'  => $account->getExchangeRate()
        ];
    }
}
