<?php
declare(strict_types=1);

namespace WolfSellers\ReferralManagement\Block\Adminhtml\Referral;

use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Framework\Registry;

class Grid extends Extended
{
    protected Registry $registry;

    public function __construct(
        Registry $registry,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $backendHelper, $data);
        $this->setId('referral_grid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultFilter([]);
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = $this->getReferralCollection(); // Aquí deberías implementar tu colección.
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', [
            'header' => __('ID'),
            'index' => 'entity_id',
            'type' => 'number',
        ]);
        $this->addColumn('firstname', [
            'header' => __('First Name'),
            'index' => 'firstname',
        ]);
        $this->addColumn('lastname', [
            'header' => __('Last Name'),
            'index' => 'lastname',
        ]);
        $this->addColumn('email', [
            'header' => __('Email'),
            'index' => 'email',
            'type' => 'text',
        ]);
        $this->addColumn('referrer_email', [
            'header' => __('Referrer Email'),
            'index' => 'referrer_email',
            'type' => 'text',
        ]);

        $this->addExportType('*/*/exportCsv', __('CSV'));
        return parent::_prepareColumns();
    }

    protected function getReferralCollection()
    {
        // Implementa aquí tu lógica para obtener la colección de referidos.
        // Ejemplo: return $this->_referralFactory->create()->getCollection();
    }
}
