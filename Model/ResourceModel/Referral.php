<?php
namespace WolfSellers\CustomerReferral\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Referral extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_referral', 'entity_id');
    }
}
