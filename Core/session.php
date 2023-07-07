<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
 'lifetime' => 1800,
 'domian' => 'localhost',
 'path'   => '/',
 'secure' => true,
 'httponly' => true
]);

session_start();

if (!isset($_SESSION['last_regenerate'])) {
    session_regenerate_id(true);
    $_SESSION['last_regenerate'] = time();
} else {
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regenerate'] >= $interval) {
        // regenerate the session id
        session_regenerate_id(true);
        // update the last session regenerate timestamp
        $_SESSION['last_regenerate'] = time();
    }
}

// https://www.php.net/manual/en/features.session.security.management.php
// https://www.php.net/manual/en/session.security.ini.php