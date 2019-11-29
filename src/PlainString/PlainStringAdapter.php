<?php
declare(strict_types=1);

namespace Dictionary\PlainString;

use Dictionary\AdapterInterface;

class PlainStringAdapter implements AdapterInterface
{
    /**
     * @var string|null
     */
    private $data;

    final public function translate(string $phrase): string
    {
        $id = md5($phrase) . '_f' . 0;
        preg_match("!\[\[\[" . $id . ':::(.*):::' . $id . "\]\]\]!m", $this->data, $result);
        return $result[1] ?? '';
    }

    final public function load(): void
    {
        $this->data = file_get_contents(PlainString::FILE);
    }
}