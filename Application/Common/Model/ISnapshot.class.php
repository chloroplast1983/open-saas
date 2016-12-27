<?php
namespace Common\Model;

/**
 * ISnapshot 接口,快照接口
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0: 20160828
 */
interface ISnapshot
{
   
    /**
     * 获取快照对象指纹
     */
    public function fingerPrint() : array;
}
