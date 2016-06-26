<?php
namespace LaraLibs\BladeDirectives\Directives;

abstract class Directive
{
    public function name()
    {
        return $this->name;
    }

    abstract public function handle($expression);
}
