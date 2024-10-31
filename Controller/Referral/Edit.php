<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use WolfSellers\CustomerReferral\Model\ReferralFactory;

class Edit extends Action
{
    protected $referralFactory;

    public function __construct(
        Context $context,
        ReferralFactory $referralFactory
    ) {
        $this->referralFactory = $referralFactory;
        parent::__construct($context);
    }

    public function execute()
    { /** @var \Magento\Framework\View\Result\Page $resultPage */
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
