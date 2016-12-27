<?php
namespace Common\Utils;

use Marmot\Common\Model\ComplexData;
use Marmot\Core;
use Common\Adapter\IAdapter;

/**
 * mongo 适配器
 */
class MockAdapter implements IAdapter
{
   
    //集合名称
    protected $collection;

    public function __construct(string $collection)
    {
        $this->collection = $collection;
    }

    public function save(ComplexData $complexData) : bool
    {
        //随机生成mongoId
        $id = $this->generateMongoId();
        //保存到内存
        Core::$cacheDriver->save($this->collection.'_'.$id, $complexData->getComplexData());
        //设置生成的id
        $complexData->setId($id);
        return true;
    }

    public function get(ComplexData $complexData) : bool
    {
        $data = Core::$cacheDriver->fetch($this->collection.'_'.$complexData->getId());
        if (empty($data)) {
            return false;
        }

        $complexData->setComplexData($data);
        return true;
    }

    private function generateMongoId()
    {
        $faker = \Faker\Factory::create('zh_CN');

        return $faker->bothify('####????####????####????');
    }
}
