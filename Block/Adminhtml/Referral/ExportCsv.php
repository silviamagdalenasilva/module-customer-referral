<?php
declare(strict_types=1);

namespace WolfSellers\ReferralManagement\Controller\Adminhtml\Referral;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class ExportCsv extends Action
{
    public function execute(): ResponseInterface
    {
        // Obtener los datos de los referidos y formatearlos como CSV.
    }
}
