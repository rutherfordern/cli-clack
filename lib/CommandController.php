<?php

namespace CliClack\Lib;

abstract class CommandController
{
    protected App $app;
    public function __construct(App $app)
    {
        $this->app = $app;
    }
    abstract public function run($argv);
    public function getApp(): App
    {
        return $this->app;
    }
}
