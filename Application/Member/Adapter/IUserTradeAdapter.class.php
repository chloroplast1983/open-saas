<?php
namespace Member\Adapter;

/**
 * 用户交易适配器接口
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0: 20161222
 */
interface IUserTradeAdapter
{
    /**
     * 获取用户账户详情
     * 因为 $id 是第三方的,所以不一定是int类型
     */
    public function getBalance($id);

    /**
     * 支付接口
     * 因为 $id 是第三方的,所以不一定是int类型
     */
    public function pay($id, $money);
}
