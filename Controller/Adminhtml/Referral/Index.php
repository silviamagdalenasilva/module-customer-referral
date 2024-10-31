<?php
declare(strict_types=1);

namespace WolfSellers\CustomerReferral\Controller\Adminhtml\Referral;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected PageFactory $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('WolfSellers_CustomerReferral::referals');
        $resultPage->getConfig()->getTitle()->prepend(__('Referral Management'));
        return $resultPage;
    }
}
