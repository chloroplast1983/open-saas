<?php
namespace Member\Adapter;

class AdapterFactory
{
    public function getAdapter(int $source)
    {
        $adapter = null;

        switch ($source) {
            case USER_SOURCE_QIDE:
                $adapter = new QiDeAdapter();
                break;
        }

        return $adapter;
    }
}
