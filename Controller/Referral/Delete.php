<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use WolfSellers\CustomerReferral\Model\ReferralFactory;

class Delete extends Action
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
    {
        $referralId = $this->getRequest()->getParam('entity_id');

        if ($referralId) {
            $referral = $this->referralFactory->create()->load($referralId);

            if ($referral->getId()) {
                try {
                    $referral->delete();
                    $this->messageManager->addSuccessMessage(__('Referido eliminado exitosamente.'));
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__('Error al eliminar el referido.'));
                }
            } else {
                $this->messageManager->addErrorMessage(__('Referido no encontrado.'));
            }
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
