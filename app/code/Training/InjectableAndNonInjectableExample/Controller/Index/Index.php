<?php

declare(strict_types=1);

namespace Training\InjectableAndNonInjectableExample\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultInterface;

class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected PageFactory $pageFactory;

    /**
     * Constructor with dependency injection
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute method for the controller
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set(__('Injectable And Non-Injectable Example'));

        return $page;
    }
}
