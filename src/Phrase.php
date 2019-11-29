<?php


namespace Dictionary;


final class Phrase
{

    /**
     * @var string
     */
    private $origin;
    /**
     * @var int
     */
    private $form;
    /**
     * @var string
     */
    private $translation;

    public function __construct(string $origin, int $form, string $translation)
    {
        $this->origin = $origin;
        $this->form = $form;
        $this->translation = $translation;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @return int
     */
    public function getForm(): int
    {
        return $this->form;
    }

    /**
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->translation;
    }
}