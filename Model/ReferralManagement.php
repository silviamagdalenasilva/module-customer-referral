<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Model;

use WolfSellers\CustomerReferral\Api\ReferralManagementInterface;
use WolfSellers\CustomerReferral\Model\ResourceModel\Referral as ReferralResource;
use WolfSellers\CustomerReferral\Model\ReferralFactory;

class ReferralManagement implements ReferralManagementInterface
{
    public function __construct(
        private readonly ReferralResource $referralResource,
        private readonly ReferralFactory $referralFactory
    ) {

    }

    /**
     * @param $data
     * @return void
     */
    public function createReferral($data) {
        // Lógica para crear el referido
    }

    /**
     * @param $id
     * @return void
     */
    public function getReferralById($id) {
        // Lógica para obtener el referido por ID
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteReferral($id) {
        // Lógica para eliminar el referido por ID
    }

    /**
     * @param $criteria
     * @return void
     */
    public function searchReferrals($criteria) {
        // Lógica para buscar referidos
    }

    /**
     * @param $referral
     * @return void
     */
    public function save($referral)
    {
        try {
            $this->referralResource->save($referral);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save referral: %1', $e->getMessage()));
        }
    }

    /**
     * @return \WolfSellers\CustomerReferral\Model\Referral
     */
    public function create()
    {
        return $this->referralFactory->create();
    }
}
