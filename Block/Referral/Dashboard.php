<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Block\Referral;

use Magento\Framework\View\Element\Template;
use WolfSellers\CustomerReferral\Model\ResourceModel\Referral\CollectionFactory;
use Magento\Customer\Model\Session;

class Dashboard extends Template
{
    /**
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param Session $customerSession
     * @param \Magento\Framework\App\RequestInterface $request
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        private readonly CollectionFactory $collectionFactory,
        private readonly Session $customerSession,
        private readonly \Magento\Framework\App\RequestInterface $request,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }


    public function getCustomerReferrals()
    {
        $this->customerSession->start();
        if (!$this->customerSession->isLoggedIn()) {
            return [];
        }
        $customerId = $this->customerSession->getCustomerId();

        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('customer_id', $customerId);

        return $collection;

    }

    /**
     * @return mixed
     */
    public function getReferral()
    {
        $referralId = $this->request->getParam('id');

        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('entity_id', $referralId);
        return $collection;
    }

    /**
     * @return string
     */
    public function getAddReferralUrl()    {

        return $this->getUrl('customerreferral/referral/add', ['_secure' => true]);
    }

    public function getEditReferralUrl($referralId)
    {
        return $this->getUrl('customerreferral/referral/edit', ['id' => $referralId]);
    }

    public function getDeleteReferralUrl(): string
    {
        return $this->getUrl('customerreferral/referral/delete');
    }

    public function getFormAction()
    {
        return $this->getUrl('customerreferral/referral/save');
    }
}
