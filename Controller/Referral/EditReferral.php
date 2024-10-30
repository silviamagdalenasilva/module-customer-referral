<?php
namespace Wolfsellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Wolfsellers\CustomerReferral\Model\ReferralFactory;

class EditReferral extends Action
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
        $data = $this->getRequest()->getPostValue();
        $referralId = $data['entity_id'] ?? null;

        if ($referralId) {
            $referral = $this->referralFactory->create()->load($referralId);

            if ($referral->getId()) {
                $referral->setData($data);

                try {
                    $referral->save();
                    $this->messageManager->addSuccessMessage(__('Referido editado exitosamente.'));
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__('Error al editar el referido.'));
                }
            } else {
                $this->messageManager->addErrorMessage(__('Referido no encontrado.'));
            }
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
