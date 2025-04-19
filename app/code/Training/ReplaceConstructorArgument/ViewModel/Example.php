<?php
declare(strict_types=1);

namespace Training\ReplaceConstructorArgument\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\ReplaceConstructorArgument\Model\Name;

class Example implements ArgumentInterface
{

    private Name $main;

    public function __construct(
        Name $main
    ) {
        $this->main = $main;
    }


    public function getName(): string
    {
        return $this->main->getName();
    }

}
