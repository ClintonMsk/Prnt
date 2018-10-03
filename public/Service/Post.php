<?php

    if ($_SERVER["PHP_AUTH_USER"] !== 'admin' && $_SERVER["PHP_AUTH_PW"] !== 'admin') {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        echo "Error";
        exit;
    }


