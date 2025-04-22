<?php

namespace Training\PoolDesign\Model;

use Magento\Framework\Exception\LocalizedException;

class CodeAlnumValidation implements CodeValidationInterface
{

    /**
     * @param string $code
     * @return void
     * @throws LocalizedException
     */
    public function validate(string $code): void
    {
        if (!ctype_alnum($code)) {
            throw new LocalizedException(__('Request parameter "code" must only contain letters and numbers.'));
        }
    }
}
