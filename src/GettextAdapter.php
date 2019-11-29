<?php
declare(strict_types=1);

namespace Dictionary;


use Gettext\Translations;
use Gettext\Translator;

final class GettextAdapter implements AdapterInterface
{
    private $file;
    /**
     * @var Translations|null
     */
    private $dictionary;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function translate(string $phrase): string
    {
        return $this->dictionary->gettext($phrase);
    }

    public function load(): void
    {
        $ext = pathinfo($this->file, PATHINFO_EXTENSION);
        $this->dictionary = new Translator();
        $this->dictionary->loadTranslations(
            Translations::__callStatic('from' . ucfirst($ext) . 'File', [$this->file])
        );
    }
}