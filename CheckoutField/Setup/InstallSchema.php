<?php

namespace Kom\CheckoutField\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    const ORDER_CUSTOM_FIELD_KEY = 'sales_recommendation';

    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->startSetup();

        $connection = $setup->getConnection();

        $connection->addColumn(
            $setup->getTable('sales_order'),
            self::ORDER_CUSTOM_FIELD_KEY,
            [
                'type' => Table::TYPE_TEXT,
                'comment' => 'Sales Recommendation'
            ]
        );

        $setup->endSetup();
    }
}