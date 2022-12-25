<?php

namespace CliClack\Lib;

class App
{
    protected CliPrinter $printer;

    protected CommandRegistry $commandReg;

    public function __construct()
    {
        $this->printer = new CliPrinter();
        $this->commandReg = new CommandRegistry();
    }

    public function getPrinter(): object
    {
        return $this->printer;
    }

    public function registerCommand($name, $callable): void
    {
        $this->commandReg->registerCommand($name, $callable);
    }

    public function registerController($commandName, CommandController $controller): void
    {
        $this->commandReg->registerController($commandName, $controller);
    }

    public function runCommand(array $argv = [], $default_command = 'help'): void
    {
        $command_name = $default_command;

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        try {
            call_user_func($this->commandReg->getCallable($command_name), $argv);
        } catch (\Exception $e) {
            $this->getPrinter()->display("ERROR: " . $e->getMessage());
            exit;
        }
    }
}