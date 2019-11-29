<?php

use Dictionary\Rebuild;
use Gettext\Translation;
use Gettext\Translations;

require_once __DIR__ . '/vendor/autoload.php';
$file = __DIR__ . '/data/fake-anonymizer.po';
function randomize(string $input): string
{
    return (string)preg_replace_callback('!\p{L}!iu', function ($match) {
        $isUpperCase = $match[0] === mb_strtoupper($match[0]);
        $result = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 1);
        if ($isUpperCase) {
            $result = ucfirst($result);
        }
        return $result;
    }, $input);
}

$translations = Translations::fromPoFile($file);
$newTranslations = new Translations();
foreach ($translations as $translation) {
    /** @var Translation $translation */
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
echo $file . "\n";
echo 'Translated from file : ' . $translations->countTranslated() . "\n";
echo 'Translated to file   : ' . $newTranslations->countTranslated() . "\n";
$newTranslations->toPoFile($file);
echo 'saved' . "\n";
(new Rebuild(Translations::fromPoFile($file)))->execute();
