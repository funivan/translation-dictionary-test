<?php

use Dictionary\GeneratedTranslations;
use Dictionary\Rebuild;
use Gettext\Translations;

require_once __DIR__ . '/vendor/autoload.php';

$translations = (new GeneratedTranslations(6500))->generate();
$translations->toPoFile('data/check.po');
(new Rebuild(Translations::fromPoFile('data/check.po')))->execute();