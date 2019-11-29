<?php

use Dictionary\GettextAdapter;
use Dictionary\Mo\Mo;
use Dictionary\Runner;

require_once __DIR__ . '/../../vendor/autoload.php';

(new Runner(new GettextAdapter(Mo::FILE, 'mo')))
    ->execute();