<?php

namespace Training\DependencyExample\Model;

use Training\DependencyExample\Api\NonInjectableInterface;

class NonInjectable implements NonInjectableInterface
{
    public function getId(): string
    {
        return 'Class Non-Injectable Ya Shezo';
    }
}
