<?php
namespace System\Classes;

/**
 * Command 抽象类
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0: 20160828
 */
abstract class CommandHandler
{
    abstract public function sendEvent(string $sourceName, int $sourceId, string $eventName);
}
