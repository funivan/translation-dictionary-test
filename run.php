<?php

use Dictionary\Rebuild;

require_once __DIR__ . '/vendor/autoload.php';

foreach (Rebuild::IDS as $name) {
    $command = 'php src/' . $name . '/test.php';
    echo "~~~~~~~~~~~~~~\n";
    echo '>> ' . $command . "\n";
    echo shell_exec($command);
}

