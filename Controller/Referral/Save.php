<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use WolfSellers\CustomerReferral\Model\ReferralFactory;
use Magento\Customer\Model\Session;

class Save extends Action
{


    public function __construct(
        Context $context,
        private readonly ReferralFactory $referralFactory,
      //  private ManagerInterface $messageManager,
        private readonly Session $customerSession
    )
    {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $referral = $this->referralFactory->create();

        if (isset($data['id'])) {
            $referral->load($data['id']);
        }

        $referral->setData($data);
        $referral->setCustomerId($this->customerSession->getCustomerId());

        try {
            $referral->save();
            $this->messageManager->addSuccessMessage(__('Referral saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Could not save referral.'));
        }

        return $this->_redirect('customerreferral/referral/index');
    }
}
