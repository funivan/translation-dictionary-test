<?php

use Dictionary\GettextAdapter;
use Dictionary\Po\Po;
use Dictionary\Runner;

require_once __DIR__ . '/../../vendor/autoload.php';
(new Runner(new GettextAdapter(Po::FILE)))
    ->execute();