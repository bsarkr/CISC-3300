<?php

use Exception;
use Error;

try {

    if (true) {
        throw new Exception('Custom error message!');
    }
    
    } catch (Error $e) {
        echo 'Caught error';
    }
