<?php

namespace Dictionary\Obj;

use Dictionary\AdapterInterface;

final class ObjAdapter implements AdapterInterface
{
    /**
     * @var null|object
     */
    private $dictionary;

    public function translate(string $phrase): string
    {
        $key = 'v' . md5($phrase) . '_f0';
        if (property_exists($this->dictionary, $key)) {
            return $this->dictionary->{$key};
        }
        return '';
    }

    public function load(): void
    {
        $this->dictionary = require Obj::FILE;
    }
}