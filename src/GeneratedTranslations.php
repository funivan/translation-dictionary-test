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

    public function __construct($limit = 6000)
    {
        $this->limit = $limit;
    }

    public function generate(): Translations
    {
        $translations = new Translations();
        $source = Factory::create();
        $destination = Factory::create('uk_UA');
        $i = 0;
        while ($i < $this->limit) {
            $i++;
            $len = random_int(10, mt_rand(50, 300));
            $offset = random_int(1, 5);
            $translation = new Translation('', $source->realText($len, $offset));
            $translation->setTranslation($destination->realText($len, $offset));
            $translations[] = $translation;
        }
        return $translations;
    }
}