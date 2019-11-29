<?php
declare(strict_types=1);

namespace Dictionary;


use Generator;
use Gettext\Translation;
use Gettext\Translations;
use IteratorAggregate;

class SourceTranslations implements IteratorAggregate
{

    /**
     * @return Translation[]
     */
    public function getIterator(): Generator
    {
        yield from Translations::fromPoFile(__DIR__ . '/../data/fake-anonymizer.po');
    }
}