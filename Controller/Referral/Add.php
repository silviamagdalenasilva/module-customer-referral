<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use WolfSellers\CustomerReferral\Model\ResourceModel\Referral\CollectionFactory;
use Magento\Customer\Model\Session as CustomerSession;

class Add extends Action
{

    public function __construct(
        Context $context,
        private readonly CollectionFactory $referralFactory,
        private readonly CustomerSession $customerSession
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if ($navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation')) {
            $navigationBlock->setActive('referral/index');
        }
        if ($block = $resultPage->getLayout()->getBlock('referral_dashboard')) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
        $resultPage->getConfig()->getTitle()->set(__('My Referrals'));
        return $resultPage;
    }
}
