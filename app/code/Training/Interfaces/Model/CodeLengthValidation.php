<?php

namespace Training\Interfaces\Model;


use Magento\Framework\Exception\LocalizedException;

class CodeLengthValidation implements CodeValidationInterface
{

    /**
     * @throws LocalizedException
     */
    public function validate(string $code): void
    {
        if (strlen($code) > 15) {
            throw new LocalizedException(__('Code is too long'));
        }
    }
}
