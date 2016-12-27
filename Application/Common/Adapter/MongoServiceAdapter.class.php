<?php
namespace Common\Adapter;

use Marmot\Common\Model\ComplexData;
use Marmot\Core;
use Common\Model\MongoObject;
use GuzzleHttp;

/**
 * mongo 适配器
 */
class MongoServiceAdapter extends Adapter implements IAdapter
{

    private $client;

    public function __construct(string $collection)
    {
        parent::__construct($collection);

        $this->client = new GuzzleHttp\Client(
            ['base_uri' => Core::$container->get('services.mongo.url')]
        );
    }

    public function save(ComplexData $complexData) : bool
    {
        if ($complexData instanceof ComplexData) {
            $response = $this->client->request(
                'POST',
                $this->collection,
                [
                'haders'=>['Content-Type' => 'application/vnd.api+json'],
                'json' => ["data"=>["type"=>"documents",
                                "attributes"=>[
                                        "data"=>$complexData->getComplexData()
                                    ]
                                ]
                       ],
                ]
            );

            if ($response->getStatusCode() != '201') {
                return false;
            }

            $body = $response->getBody();

            $data = json_decode($body->getContents(), true);
            $data = $data['data'];
            if (empty($data)) {
                return false;
            }

            $complexData->setId($data['id']);
            return true;
        }
        return false;
    }

    public function get(ComplexData $complexData) : bool
    {
        if ($complexData instanceof ComplexData && !empty($complexData->getId())) {
            $response = $this->client->request(
                'GET',
                $this->collection.'/'.$complexData->getId(),
                [
                'haders'=>['Content-Type' => 'application/vnd.api+json'],
                ]
            );

            if ($response->getStatusCode() != '200') {
                return false;
            }

            $body = $response->getBody();
            
            $data = json_decode($body->getContents(), true);
            $data = $data['data'];
            if (empty($data)) {
                return false;
            }

            $complexData->setComplexData($data['attributes']['data']);
            return true;
            ;
        }
        return false;
    }

    public function getList(array $complexDatas) : bool
    {
        $ids = array();
        foreach ($complexDatas as $complexData) {
            if (!$complexData instanceof ComplexData) {
                return false;
            }
            $ids[] = $complexData->getId();
        }

        if (!empty($ids)) {
            $response = $this->client->request(
                'POST',
                $this->collection.'/multi',
                [
                'haders'=>['Content-Type' => 'application/vnd.api+json'],
                'json' => ["data"=>["type"=>"documents",
                                    "attributes"=>[
                                        "ids"=>$ids
                                        ]
                                    ]
                          ],
                ]
            );

            if ($response->getStatusCode() != '200') {
                return false;
            }

            $body = $response->getBody();
            $data = json_decode($body->getContents(), true);
            $data = $data['data'];
            if (empty($data)) {
                return false;
            }

            $infoList = array();
            foreach ($data as $info) {
                $infoList[$info['id']] = $info['attributes']['data'];
            }

            foreach ($complexDatas as $complexData) {
                $complexData->setComplexData($infoList[$complexData->getId()]);
            }

            return true;
        }
        return false;
    }
}
