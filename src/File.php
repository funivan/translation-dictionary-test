<?php
declare(strict_types=1);

namespace Dictionary;


class File
{
    /**
     * @var string
     */
    private $path;
    private $truncated = false;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function write(string $line): void
    {
        if (!$this->truncated) {
            file_put_contents($this->path, "");
            $this->truncated = true;
        }
        file_put_contents($this->path, $line . "\n", FILE_APPEND);
    }
}