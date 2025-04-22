<?php

declare(strict_types=1);

namespace Training\PoolDesign\Model;

use Magento\Framework\Exception\LocalizedException;

class CodeLengthValidation implements CodeValidationInterface
{

    /**
     * @param string $code
     * @return void
     * @throws LocalizedException
     */
    public function validate(string $code): void
    {
        if (strlen($code) > 10) {
            throw new LocalizedException(__('Code is too long.'));
        }
    }
}
