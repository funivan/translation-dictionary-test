<?php

use Dictionary\Rebuild;
use Gettext\Translation;
use Gettext\Translations;

require_once __DIR__ . '/vendor/autoload.php';
function randomize(string $input): string
{
    return (string)preg_replace_callback('!\p{L}!iu', function ($match) {
        $isUpperCase = $match[0] === mb_strtoupper($match[0]);
        $result = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 1);
        if ($isUpperCase) {
            $result = ucfirst($result);
        }
        return $result;
    }, $input);
}

$translations = Translations::fromPoFile(__DIR__ . '/data/fake-anonymizer.po');
$newTranslations = new Translations();
foreach ($translations as $translation) {
    assert($translation instanceof Translation);
    if ($translation->getTranslation() !== '') {
        $new = new Translation(
            '',
            randomize($translation->getOriginal()),
            randomize((string)$translation->getPlural())
        );
        $new->setTranslation(randomize($translation->getTranslation()));
        $new->setPluralTranslations(array_map('randomize', $translation->getPluralTranslations()));
        $newTranslations[] = $new;
    }
}
echo 'Translated from file : ' . $translations->countTranslated() . "\n";
echo 'Translated to file   : ' . $newTranslations->countTranslated() . "\n";
$newTranslations->toPoFile('data/check.po');
echo 'saved' . "\n";
(new Rebuild(Translations::fromPoFile('data/check.po')))->execute();
