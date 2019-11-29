<?php
declare(strict_types=1);

namespace Dictionary;

use Generator;
use Gettext\Translations;
use IteratorAggregate;

class PhraseTranslations implements IteratorAggregate
{
    /**
     * @var Translations
     */
    private $translations;

    public function __construct(Translations $translations)
    {
        $this->translations = $translations;
    }

    /**
     * @return Phrase[]
     */
    final public function getIterator(): Generator
    {
        foreach ($this->translations as $translation) {
            $forms = $translation->getPluralTranslations();
            if ($forms === []) {
                $forms[0] = $translation->getTranslation();
            }
            foreach ($forms as $form => $phrase) {
                yield new Phrase($translation->getOriginal(), $form, $phrase);
            }
        }
    }
}