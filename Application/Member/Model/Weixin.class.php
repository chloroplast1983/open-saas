<?php
namespace Member\Model;

class Weixin
{
   
    /**
     * @var string 微信unionId
     */
    private $unionId;

    public function __construct(string $unionId = '')
    {
        $this->unionId = $unionId;
    }

    public function __destruct()
    {
        unset($this->unionId);
    }

    public function getUnionId()
    {
        return $this->unionId;
    }
}
