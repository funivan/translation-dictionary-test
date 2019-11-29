<?php


namespace Dictionary;


interface AdapterInterface
{

    public function translate(string $phrase): string;

    public function load(): void;
}