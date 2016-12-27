<?php
namespace Common\Model;

use Marmot\Common\Model\ObjectIdentify;
use Common\Model\SnapshotData;
use Marmot\Core;

abstract class Snapshot
{

    use ObjectIdentify;
    /**
     * @var int $id 快照id
     */
    protected $id;
    /**
     * @var ComplexData $snapshotData 快照内容
     */
    protected $snapshotData;
    /**
     * @var int $createTime 创建时间
     */
    protected $createTime;
    /**
     * @var ISnapshot $snapshotObject
     */
    protected $snapshotObject;

    public function __construct(SnapshotData $snapshotData, int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->snapshotObject = '';
        $this->snapshotData = $snapshotData;
        $this->createTime = $_FWGLOBAL['timestamp'];
    }

    public function __destruct()
    {
        unset($this->id);
        unset($this->snapshotData);
        unset($this->createTime);
        unset($this->snapshotObject);
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function getSnapshotData()
    {
        return $this->snapshotData;
    }

    public function setSnapshotObject(ISnapshot $snapshotObject)
    {
        $this->snapshotObject = $snapshotObject;
    }

    public function getSnapshotObject()
    {
        return $this->snapshotObject;
    }

    /**
     * 快照
     * @var ISnapshot $snapshotObject 快照对象
     * @var SnapshotData 快照对象存储
     */
    public function capture(ISnapshot $snapshotObject) : bool
    {
        $this->snapshotObject = $snapshotObject;
        
        $this->snapshotData->setComplexData($snapshotObject->fingerPrint());
        $this->snapshotData->save();

        return $this->save($this);
    }

    /**
     * 保存快照信息
     */
    abstract public function save() : bool;
}
