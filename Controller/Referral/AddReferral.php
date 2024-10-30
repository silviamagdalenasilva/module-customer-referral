<?php
namespace Wolfsellers\CustomerReferral\Controller\Referral;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Wolfsellers\CustomerReferral\Model\ReferralFactory;

class AddReferral extends Action
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
        $data = $this->getRequest()->getPostValue(); // Captura datos del formulario

        if ($data) {
            $referral = $this->referralFactory->create();
            $referral->setData($data);

            try {
                $referral->save(); // Guarda el nuevo referido
                $this->messageManager->addSuccessMessage(__('Referido agregado exitosamente.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error al agregar el referido.'));
            }
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
