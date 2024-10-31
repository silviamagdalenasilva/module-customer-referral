<?php
declare(strict_types=1);
namespace WolfSellers\CustomerReferral\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{
    public function __construct(
        private readonly CustomerRepositoryInterface $customerRepository
    ) {
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
        && version_compare($context->getVersion(), '1.0.1', '<')) {
            $customer = $this->customerRepository->get('roni_cost@example.com');

            if (!$customer->getId()) {
                throw new \Exception('Usuario roni_cost@example.com no encontrado.');
            }

            $referrersData = [
                ['first_name' => 'Referido 1', 'last_name' => 'Apellido 1', 'email' => 'referido1@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 2', 'last_name' => 'Apellido 2', 'email' => 'referido2@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 3', 'last_name' => 'Apellido 3', 'email' => 'referido3@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 4', 'last_name' => 'Apellido 4', 'email' => 'referido4@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 5', 'last_name' => 'Apellido 5', 'email' => 'referido5@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 6', 'last_name' => 'Apellido 6', 'email' => 'referido6@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 7', 'last_name' => 'Apellido 7', 'email' => 'referido7@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 8', 'last_name' => 'Apellido 8', 'email' => 'referido8@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 9', 'last_name' => 'Apellido 9', 'email' => 'referido9@example.com', 'phone' => '123','customer_id' => $customer->getId()],
                ['first_name' => 'Referido 10', 'last_name' => 'Apellido 10', 'email' => 'referido10@example.com', 'phone' => '123','customer_id' => $customer->getId()]
            ];
            foreach ($referrersData as $row) {
                $setup->getConnection()->insert($setup->getTable('customer_referral'), $row);
            }
         }
        $setup->endSetup();
    }
}
