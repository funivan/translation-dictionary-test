<?php

namespace Dictionary\Obj;

use Dictionary\AdapterInterface;
use UkrainianDictionary;

final class ObjAdapter implements AdapterInterface
{
    /**
     * @var null|object
     */
    private $dictionary;

    public function translate(string $phrase): string
    {
        $key = 'v' . crc32($phrase . '::form' . 0);
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