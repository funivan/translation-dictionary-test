<?php
declare(strict_types=1);

namespace Dictionary;


use RuntimeException;

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

    final public function execute() : void
    {
        $start = (memory_get_usage(true));
        $this->dictionary->load();
        $load = (memory_get_usage(true)) - $start;
        $start = microtime(true);
        $i = 0;
        $checked = 0;
        foreach (new SourceTranslations() as $phrase) {
            if ($i % 40 === 0) {
                $result = $this->dictionary->translate($phrase->getOriginal());
                if ($result === '') {
                    throw new RuntimeException('Can not translate phrase: ' . $phrase->getOriginal());
                }
                $checked++;
            }
            $i++;
        }
        echo 'TIME_TRANS  : ' . (microtime(true) - $start) . "\n";
        echo 'MEMORY_LOAD : ' . (round($load / 1024 / 1024, 4)) . 'Mb' . ' [' . round($load / 1024) . 'Kb]' . "\n";
        echo 'PHRASES     : ' . $i . "\n";
        echo 'CHECKED     : ' . $checked . "\n";
    }
}