<?php
namespace Wolfsellers\CustomerReferral\Model;

use Magento\Framework\Model\AbstractModel;

class Referral extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Wolfsellers\CustomerReferral\Model\ResourceModel\Referral::class);
    }
}
