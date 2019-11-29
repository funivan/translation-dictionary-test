<?php
declare(strict_types=1);

use Dictionary\GettextAdapter;
use Dictionary\PhpArray\PhpArray;
use Dictionary\Runner;

require_once __DIR__ . '/../../vendor/autoload.php';
(new Runner(new GettextAdapter(PhpArray::FILE)))
    ->execute();