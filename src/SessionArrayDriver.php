<?php 

namespace Styde;

class SessionArrayDriver implements SessionDriveInterface
{   
    protected $data;

    public function __construct(array $data = array()) {
        $this->data = $data;
    }

    public function load(): array
    {
        return $this->data;
    }
}
