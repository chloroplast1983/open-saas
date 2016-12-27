<?php
namespace Common\Adapter;

trait AdapterOperation
{
    public function setAdapter(string $adapterName)
    {
        $adapter = new $adapterName($this->key);

        if ($adapter instanceof IAdapter) {
            $this->adapter = $adapter;
            return true;
        }
        return false;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function save() : bool
    {
        return $this->adapter->save($this);
    }

    public function fetch() : bool
    {
        return $this->adapter->get($this);
    }
}
