<?php

namespace WolfSellers\CustomerReferral\Model;

use Magento\Framework\Model\AbstractModel;

class Referral extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\WolfSellers\CustomerReferral\Model\ResourceModel\Referral::class);
    }

    /**
     * @param $referralId
     * @return \Magento\Framework\Phrase
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function updateReferralStatus($referralId)
    {
        // Obtener la colección de referidos y cargar el registro
        $referral = $this->referralRepository->getById($referralId);

        // Comprobar que el referido existe y pertenece a un cliente
        if (!$referral || !$referral->getCustomerId()) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Referido no encontrado.'));
        }

        // Actualizar el estado del referido a "registrado"
        $referral->setStatus('registrado');
        $this->referralRepository->save($referral);

        return __('Estado del referido actualizado a registrado.');
    }
}
