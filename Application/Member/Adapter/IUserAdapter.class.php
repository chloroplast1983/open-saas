<?php
namespace Member\Adapter;

/**
 * 获取用户详情适配器
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0: 20161222
 */
interface IUserAdapter
{
    /**
     * 获取用户详情
     */
    public function getOne($id);
}
