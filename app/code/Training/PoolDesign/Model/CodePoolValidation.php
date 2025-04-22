<?php

namespace Training\PoolDesign\Model;

class CodePoolValidation
{

    /** @var array|CodeValidationInterface[]  */
    protected array $validators;

    /**
     * @param array|CodeValidationInterface[] $validators
     */
    public function __construct(
        array $validators = []
    ) {
        $this->validators = $validators;
    }

    /**
     * @param string $code
     * @return void
     */
    public function validate(string $code): void
    {
        foreach ($this->validators as $validator) {
            $validator->validate($code);
        }
    }
}
