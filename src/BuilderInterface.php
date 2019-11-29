<?php
declare(strict_types=1);

namespace Dictionary;


use Gettext\Translations;

interface BuilderInterface
{
    public function build(Translations $phrases): void;
}