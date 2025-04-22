<?php

declare(strict_types=1);

namespace Training\PoolDesign\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\InvalidArgumentException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\PoolDesign\Model\CodePoolValidation;

class Example implements ArgumentInterface
{

    private CodePoolValidation $codePoolValidation;

    public function __construct(
        CodePoolValidation $codePoolValidation,
    ) {

        $this->codePoolValidation = $codePoolValidation;
    }

    /**
     * @param RequestInterface $request
     * @return string
     */
    public function getCode(RequestInterface $request): string
    {
        $code = (string) $request->getParam('code');

        //        if ($code === '') {
        //            throw new InvalidArgumentException(__('Request parameter "code" is missing.'));
        //        }
        //
        //        if (strlen($code) > 10) {
        //            throw new InvalidArgumentException(__('Request parameter "code" is not 32 characters.'));
        //        }
        //
        //        if (!ctype_alnum($code)) {
        //            throw new InvalidArgumentException(__('Request parameter "code" is invalid.'));
        //        }
        $this->codePoolValidation->validate($code);
        return $code;
    }

}
