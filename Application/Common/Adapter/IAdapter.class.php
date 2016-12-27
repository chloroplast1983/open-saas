<?php
namespace Common\Adapter;

use Marmot\Common\Model\ComplexData;

interface IAdapter
{
    public function save(ComplexData $complexData) : bool;

    public function get(ComplexData $complexData) : bool;
}
