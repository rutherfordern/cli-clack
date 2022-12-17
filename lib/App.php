<?php

namespace CliClack\Lib;

class App
{
    protected object $printer;

    protected array $registry = [];

    public function __construct()
    {
        $this->printer = new CliPrinter();
    }

    public function getPrinter(): object
    {
        return $this->printer;
    }

    public function registerCommand($name, $callback): void
    {
        $this->registry[$name] = $callback;
    }

    public function getCommand($command)
    {
        return $this->registry[$command] ?? null;
    }

    public function runCommand(array $argv): void
    {
        $commandName = 'help';

        if (isset($argv[1])) {
            $commandName = $argv[1];
        }

        $command = $this->getCommand($commandName);
        if ($command === null) {
            throw new \Exception("Command '{$commandName}' is not found");
        }

        call_user_func($command, $argv);
    }
}