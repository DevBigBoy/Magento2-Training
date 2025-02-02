<?php

namespace Training\DependencyExample\Model\VirtualType;

class UpperCaseName extends Name
{

    public function getName(string $name): string
    {
        return strtoupper(Parent::getName($name));
    }
}
