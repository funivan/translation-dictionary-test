<?php
declare(strict_types=1);

namespace Dictionary\Po;


use Dictionary\BuilderInterface;
use Gettext\Translations;

class Po implements BuilderInterface
{
    const FILE = __DIR__ . '/autogenerated-translated.po';

    public function build(Translations $phrases): void
    {
        $phrases->toPoFile(self::FILE, ['includeHeaders' => false]);
    }
}