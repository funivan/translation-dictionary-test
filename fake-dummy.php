<?php

use Dictionary\GeneratedTranslations;
use Dictionary\Rebuild;
use Gettext\Translations;

require_once __DIR__ . '/vendor/autoload.php';

$translations = (new GeneratedTranslations(5000))->generate();
$translations->toPoFile('data/fake-dummy.po');
(new Rebuild(Translations::fromPoFile('data/fake-dummy.po')))->execute();