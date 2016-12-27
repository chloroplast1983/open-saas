<?php
namespace Common\Model;

use Marmot\Common\Model\ComplexData;
use Marmot\Core;
use Common\Adapter\MongoServiceAdapter;
use Common\Adapter\AdapterOperation;

class SnapshotData extends ComplexData
{

    protected $adapter;

    protected $key = '';

    use AdapterOperation;

    public function __construct(array $complexData = array(), string $id = '')
    {
        parent::__construct($complexData, $id);
        $adapters = Core::$container->get('adapter');
        $this->adapter = new $adapters['ComplexDataAdapter']($this->key);
    }
}
