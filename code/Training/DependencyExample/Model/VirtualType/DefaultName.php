<?php

namespace Training\DependencyExample\Model\VirtualType;

class DefaultName
{

    public function getName(string $name): string
    {
        return $name;
    }

}
