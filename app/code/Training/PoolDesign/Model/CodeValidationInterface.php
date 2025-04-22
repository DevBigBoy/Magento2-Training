<?php

namespace Training\PoolDesign\Model;

interface CodeValidationInterface
{
    public function validate(string $code): void;
}
