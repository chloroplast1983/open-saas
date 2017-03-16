<?php
namespace Member\Adapter;

use Marmot\Core;
use GuzzleHttp;

use Member\Model\User;
use Member\Model\Account;
use Member\Translator\QiDeUserTranslator;
use Member\Translator\QiDeAccountTranslator;

/**
 * mongo 适配器
 */
class QiDeAdapter implements IUserAdapter, IUserTradeAdapter
{

    private $client;

    public function __construct()
    {
        $this->client = new GuzzleHttp\Client(
            ['base_uri' => Core::$container->get('open.qide.url')]
        );
    }

    private function generateToken(string $method, array $parameters)
    {
        $appSecret = Core::$container->get('open.qide.appSecret');
        $tokens = array(
                    'app_id'=>Core::$container->get('open.qide.appId'),
                    'method'=>$method,
                    'time'=>date('Y-m-d H:i:s', time()),
                );
        $tokens = array_merge($tokens, $parameters);
        ksort($tokens);
        $tokenStr = '';
        foreach ($tokens as $key => $token) {
            $tokenStr.= $key.$token;
        }
        $tokenStr = $appSecret.$tokenStr.$appSecret;
        return md5($tokenStr);
    }

    public function getOne($id)
    {
        $id = base64_decode($id);

        if (!empty($id)) {
            $response = $this->client->request(
                'GET',
                'api/user/getuserinfo/',
                [
                    'query' => [
                        'sign' => $this->generateToken('user.getuserinfo', array('sourceId'=>$id)),
                        'app_id'=> Core::$container->get('open.qide.appId'),
                        'time'=> date('Y-m-d H:i:s', time()),
                        'method'=>'user.getuserinfo',
                        'sourceId'=>$id
                    ]
                ]
            );

            $body = $response->getBody();
            
            $data = json_decode($body->getContents(), true);
            if (empty($data) || $data['code'] != 1) {
                //插入日志
                return false;
            }

            $translator = new QiDeUserTranslator();
            $user = $translator->arrayToObject($data['info']);
            if ($user instanceof User) {
                $user->setId($id);
                return $user;
            }
        }
        return false;
    }

    public function getBalance($id)
    {
        $id = base64_decode($id);

        if (!empty($id)) {
            $response = $this->client->request(
                'GET',
                'api/account/getbalance/',
                [
                    'query' => [
                        'sign' => $this->generateToken('account.getbalance', array('sourceId'=>$id)),
                        'app_id'=> Core::$container->get('open.qide.appId'),
                        'time'=>date('Y-m-d H:i:s', time()),
                        'method'=>'account.getbalance',
                        'sourceId'=>$id
                    ]
                ]
            );

            $body = $response->getBody();
            
            $data = json_decode($body->getContents(), true);
            if (empty($data) || $data['code'] != 1) {
                //插入日志
                return false;
            }

            $translator = new QiDeAccountTranslator();
            $account = $translator->arrayToObject($data['info']);
            if ($account instanceof Account) {
                $account->setId($id);
                return $account;
            }
        }
        return false;
    }

    public function pay($id, $money)
    {
        $id = base64_decode($id);
        
        if (!empty($id) && !empty($money)) {
            //根据汇率计算金额
            $money = round($money * Core::$container->get('open.qide.exchangeRate'));

            $response = $this->client->request(
                'GET',
                'api/account/deduct/',
                [
                    'query' => [
                        'sign' => $this->generateToken('account.deduct', array('sourceId'=>$id,'amount'=>$money)),
                        'app_id'=> Core::$container->get('open.qide.appId'),
                        'time'=> date('Y-m-d H:i:s', time()),
                        'method'=>'account.deduct',
                        'sourceId'=>$id,
                        'amount'=> $money
                    ]
                ]
            );

            $body = $response->getBody();
            
            $data = json_decode($body->getContents(), true);
            if (empty($data) || $data['code'] != 1) {
                //插入日志
                //-5 余额不足
                return false;
            }

            return true;
        }
        return false;
    }
}
