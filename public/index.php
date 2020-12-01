<?php

use Styde\{AccessHandler, Authenticator, SessionArrayDriver, SessionManager};

require(__DIR__ . '/../bootstrap/start.php');


view('index', compact('access'));
