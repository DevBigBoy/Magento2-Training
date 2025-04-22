<?php

declare(strict_types=1);

namespace Training\PoolDesign\Model;

use Magento\Framework\Exception\LocalizedException;

class CodeNotEmptyValidation implements CodeValidationInterface
{

    /**
     * @param string $code
     * @return void
     * @throws LocalizedException
     */
    public function validate(string $code): void
    {
        if ($code === '') {
            throw new LocalizedException(__('Code Can not be Empty'));
        }
    }
}
