<?php
namespace Wolfsellers\CustomerReferral\Block\Referral;

use Magento\Framework\View\Element\Template;
use Wolfsellers\CustomerReferral\Model\ResourceModel\Referral\CollectionFactory;
use Magento\Customer\Model\Session;

class ReferralDashboard extends Template
{
    protected $collectionFactory;
    protected $customerSession;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        Session $customerSession,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getReferrals()
    {
        $customerId = $this->customerSession->getCustomerId();
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('customer_id', $customerId);
        return $collection;
    }

    public function getAddReferralUrl()
    {
        return $this->getUrl('customerreferral/referral/add');
    }

    public function getEditReferralUrl($referralId)
    {
        return $this->getUrl('customerreferral/referral/edit', ['id' => $referralId]);
    }

    public function getDeleteReferralUrl($referralId)
    {
        return $this->getUrl('customerreferral/referral/delete', ['id' => $referralId]);
    }
}
