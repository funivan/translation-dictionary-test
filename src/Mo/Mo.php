<?php
declare(strict_types=1);

namespace Dictionary\Mo;


use Dictionary\BuilderInterface;
use Gettext\Translations;

class Mo implements BuilderInterface
{
    const FILE = __DIR__ . '/autogenerated-translated.mo';

    public function build(Translations $phrases): void
    {
        $phrases->toMoFile(self::FILE, ['includeHeaders' => false]);
    }
}