<?php
namespace WolfSellers\CustomerReferral\Model\ResourceModel\Referral;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(
            'WolfSellers\CustomerReferral\Model\Referral',
            'WolfSellers\CustomerReferral\Model\ResourceModel\Referral'
        );
    }
}
