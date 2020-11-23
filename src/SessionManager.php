<?php


namespace Styde;

use Styde\SessionFileDriver as Driver;

class SessionManager
{
    protected $driver;
    protected $loaded = false;
    protected $data = array();

    public function __construct(Driver $driver) {
        $this->driver = $driver;
    }

    protected function load()
    {
        if ($this->loaded) return;

        $this->data = $this->driver->load();

        $this->loaded = true;
    }

    public function get($key)
    {
        $this->load();

        return isset($this->data[$key])
            ? $this->data[$key]
            : null;
    }

} 