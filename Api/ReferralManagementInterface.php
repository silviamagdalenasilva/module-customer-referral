<?php
namespace WolfSellers\CustomerReferral\Api;

interface ReferralManagementInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function createReferral($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getReferralById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteReferral($id);

    /**
     * @param $criteria
     * @return mixed
     */
    public function searchReferrals($criteria);

    /**
     * Guarda el referido
     *
     * @param \WolfSellers\CustomerReferral\Model\Referral $referral
     * @return \WolfSellers\CustomerReferral\Model\Referral
     */
    public function save($referral);

    /**
     * Crea una nueva instancia de Referral
     *
     * @return \WolfSellers\CustomerReferral\Model\Referral
     */
    public function create();
}
