<?php
declare(strict_types=1);

namespace Dictionary;


class Runner
{
    /**
     * @var AdapterInterface
     */
    private $dictionary;

    public function __construct(AdapterInterface $adapter)
    {
        $this->dictionary = $adapter;
    }

    public function execute()
    {
        $start = (memory_get_usage(true) / 1024);
        $this->dictionary->load();
        $load = (memory_get_usage(true) / 1024) - $start;
        $start = microtime(true);
        $i = 0;
        foreach (new SourceTranslations() as $phrase) {
            $this->dictionary->translate($phrase->getOriginal());
            $i++;
        }
        echo 'TIME_TRANS  : ' . (microtime(true) - $start) . " kb\n";
        echo 'MEMORY_LOAD : ' . $load . "\n";
        echo 'PHRASES     : ' . $i . "\n";
    }
}