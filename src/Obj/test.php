<?php

declare(strict_types=1);

use Dictionary\Obj\ObjAdapter;
use Dictionary\Runner;
use Dictionary\Translate;

require_once __DIR__ . '/../../vendor/autoload.php';
(new Runner(new ObjAdapter()))
    ->execute();