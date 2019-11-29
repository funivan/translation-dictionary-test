<?php
declare(strict_types=1);

namespace Dictionary;


use Gettext\Translations;

class Rebuild
{
    public const IDS = [
        'Mo',
        'Obj',
        'PhpArray',
        'Po',
    ];

    /**
     * @var Translations
     */
    private $translations;

    public function __construct(Translations $translations)
    {
        $this->translations = $translations;
    }

    final public function execute(): void
    {
        $ids = self::IDS;
        foreach ($ids as $name) {
            $fqn = '\\Dictionary\\' . $name . '\\' . $name;
            $object = new $fqn;
            assert($object instanceof BuilderInterface);
            $object->build($this->translations);
        }
    }

}