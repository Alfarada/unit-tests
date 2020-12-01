<?php

namespace Styde;

class Container
{   
    protected static $container;

    protected $shared = array();
    
    public static function getInstance()
    {
         if (static::$container == null) {
            static::$container = new container;
         }

         return static::$container;
    }

    public function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public function clearContainer()
    {
        static::$container = null;
    }

    public function session()
    {   
        if (isset ($this->shared['session'])) {
            return $this->shared['session'];
        }

        $data = array(
            'user_data' => array(
                'name' => 'Alfredo',
                'role' => 'student'
            )
        );

        $driver = new SessionArrayDriver($data);

        return new SessionManager($driver);
    }

    public function auth()
    {   
        if (isset ($this->shared['auth'])) {
            return $this->shared['auth'];
        }

        return $this->shared['auth'] = new Authenticator($this->session());
    }

    public function access()
    {    
        if (isset ($this->shared['access'])) {
            return $this->shared['access'];
        }

        return $this->shared['access'] = new AccessHandler($this->auth());
    }
}
