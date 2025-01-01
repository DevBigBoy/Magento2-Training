<?php

namespace Training\DependencyExample\Model;

class NonInjectable
{
    public function getId(): string
    {
        return 'Class Injectable';
    }
}
