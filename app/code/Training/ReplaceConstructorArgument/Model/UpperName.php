<?php

namespace Training\ReplaceConstructorArgument\Model;

class UpperName extends Name
{
    public function getName(): string
    {
        return strtoupper(parent::getName());
    }

}
