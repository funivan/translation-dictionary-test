<?php


namespace Dictionary;

namespace Dictionary\PlainString;


use Dictionary\BuilderInterface;
use Dictionary\File;
use Dictionary\PhraseTranslations;
use Gettext\Translations;

class PlainString implements BuilderInterface
{
    const FILE = __DIR__ . '/autogenerated-translations.plainString';

    final public function build(Translations $phrases): void
    {
        $file = new File(self::FILE);
        foreach (new PhraseTranslations($phrases) as $phrase) {
            $id = md5($phrase->getOrigin()) . '_f' . $phrase->getForm();
            $translation = $phrase->getTranslation();
            $file->write('[[[' . $id . ':::' . $translation . ':::' . $id . ']]]');
        }
    }
}