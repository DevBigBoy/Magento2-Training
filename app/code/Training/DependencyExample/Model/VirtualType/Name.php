<?php

namespace Training\DependencyExample\Model\VirtualType;

class Name
{

    public function getName(string $name): string
    {
        return $name;
    }

}
