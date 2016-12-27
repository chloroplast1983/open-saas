<?php
namespace Common\Adapter;

use Marmot\Common\Model\ComplexData;

class Adapter
{
    //集合名称
    protected $collection;

    public function __construct(string $collection)
    {
        $this->collection = $collection;
    }
}
