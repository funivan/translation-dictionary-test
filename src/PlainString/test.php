<?php

declare(strict_types=1);

use Dictionary\PlainString\PlainStringAdapter;
use Dictionary\Runner;

require_once __DIR__ . '/../../vendor/autoload.php';
(new Runner(new PlainStringAdapter()))
    ->execute();