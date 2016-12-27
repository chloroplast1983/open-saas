<?php
namespace Common\Model;

trait SnapshotOperation
{
    private function takeSnapshot(Snapshot $snapshot)
    {
        if ($snapshot->capture($this)) {
            return true;
        }
        return false;
    }
}
