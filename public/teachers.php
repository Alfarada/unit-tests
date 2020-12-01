<?php

use Styde\{AccessHandler, Authenticator, SessionArrayDriver, SessionManager};

require(__DIR__ . '/../bootstrap/start.php');



function teacherController()
{   
    global $access;
    
    if (!$access->check('teacher')) {
        abort404();
    }
    
    view('teachers', compact('access'));
    
}

teacherController(); 