<?php

namespace CliClack\App\Command;
use CliClack\Lib\CommandController;

class HelloController extends CommandController
{
    public function run($argv)
    {
        $name = $argv[2] ?? "World";
        $this->getApp()->getPrinter()->display("Hello, {$name}!");
    }
}