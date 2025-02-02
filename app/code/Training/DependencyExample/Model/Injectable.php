<?php

namespace Training\DependencyExample\Model;

use Training\DependencyExample\Api\InjectableInterface;

class Injectable implements InjectableInterface
{
    public function getId(): string
    {
        return 'Class Injectable';
    }
}
