<?php

use Exception;
use Error;

try {
    if (true) {
        throw new Exception('Custom error message!');
    }
} catch (Exception $e) { // Catch Exception instead of Error
    echo 'Caught exception: ' . $e->getMessage();
}