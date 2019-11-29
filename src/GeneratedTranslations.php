<?php


namespace Dictionary;


use Faker\Factory;
use Gettext\Translation;
use Gettext\Translations;

class GeneratedTranslations
{
    /**
     * @var int
     */
    private $limit;

    public function __construct(int $limit = 6000)
    {
        $this->limit = $limit;
    }

    final public function generate(): Translations
    {
        $translations = new Translations();
        $source = Factory::create();
        $destination = Factory::create('uk_UA');
        $i = 0;
        while ($i < $this->limit) {
            $i++;
            $len = random_int(10, random_int(50, 300));
            $offset = random_int(1, 5);
            $text = $source->realText($len, $offset);
            $translation = new Translation(md5($text), $text);
            $translation->setTranslation($destination->realText($len, $offset));
            $translations[] = $translation;
        }
        return $translations;
    }
}