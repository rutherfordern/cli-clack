<?php

namespace CliClack\Lib;

class CommandRegistry
{
    protected array $registry = [];

    protected array $controllers = [];

    public function registerController($commandName, CommandController $controller): void
    {
        $this->controllers = [ $commandName => $controller ];
    }

    public function registerCommand($name, $callback): void
    {
        $this->registry[$name] = $callback;
    }

    public function getCommand($command)
    {
        return $this->registry[$command] ?? null;
    }

    public function getController($command)
    {
        return $this->controllers[$command] ?? null;
    }

    public function getCallable($commandName)
    {
        $controller = $this->getController($commandName);

        if ($controller instanceof CommandController) {
            return [ $controller, 'run' ];
        }

        $command = $this->getCommand($commandName);
        if ($command === null) {
            throw new \Exception("Command '{$commandName}' is not found");
        }

        return $command;
    }
}