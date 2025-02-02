<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model;

class HeavyOperation
{
    protected string $name;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->name = "Heavy Operation Class";
    }

    public function getName(): string
    {
        return $this->name;
    }

}
