<?php

namespace Training\Interfaces\Model;

use Magento\Framework\Exception\LocalizedException;

class CodeNumValidation implements CodeValidationInterface
{

    /**
     * @throws LocalizedException
     */
    public function validate(string $code): void
    {
        if ($code === null) {
            throw new LocalizedException(__('Code is required.'));
        }
    }
}
