<?php

namespace CliClack\Lib;

/**
 * Данный класс помогает выводить сообщения в необходимом виде
 */

class CliPrinter
{
    public function out(string $message): void
    {
        print_r($message);
    }

    public function newLine(): void
    {
        $this->out("\n");
    }

    public function display($message): void
    {
        $this->newLine();
        $this->out($message);
        $this->newLine();
    }
}