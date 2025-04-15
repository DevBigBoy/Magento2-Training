<?php

namespace Training\Interfaces\Model;

interface CodeValidationInterface
{
    public function validate(string $code): void;
}
